<?php

namespace App\Http\Controllers\userController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Bills;
use App\Models\User;
use App\Models\Favorites;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        // dd('hihi');
       return view('user.page.login');
    }
    public function postlogin(request $request){
        // Kiểm tra dữ liệu nhập vào
        $validator = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' =>'required|string',
        ]);
        // Nếu validation thất bại
        if($validator->fails()){
            return redirect()->back()->withErrors('$validator')->withInput();
        }
        // Kiểm tra tài khoản có bị khoá chưa
        $user = User::where('email', $request->email)->first();
        if ($user && $user->status == 'locked') {
                $lockUntil = new \DateTime($user->lock_until);
                $timeRemaining = $lockUntil->diff(new \DateTime())->format('%h:%i:%s');
                if ($timeRemaining > '00:00:00') {
                    // Tài khoản vẫn bị khóa
                    return redirect()->back()->withErrors([
                        'email' => "Tài khoản của bạn bị khóa, sẽ mở khóa trong vòng $timeRemaining nữa.",
                    ])->withInput();
                } else {
                    // Tài khoản đã được mở khóa
                    $user->faile_login_attempts = 0;
                    $user->status = 'active';
                    $user->save();
                }
        }

        // Xác thực người dùng
        $credentials= $request->only('email','password');
        if(auth::attempt($credentials)){
            // Đăng nhập thành công
            if($user->failed_login_attempts>0){
                // Reset số lần đăng nhập sai
                $user->faile_login_attempts = 0;
                $user->save();
            }
            return redirect()->route('user.home');
        }else{
            // Đăng nhập thất bại
            if($user){
                // Tăng số lần đăng nhập sai
                $user->failed_login_attempts++;
                if($user->failed_login_attempts>=2){
                    // Khoá tài khoăn
                    $user->status = 'locked';
                    $user->lock_until = now()->addHours(24);
                }
                $user->save();
            }
            return redirect()->back()->withErrors([
                'email' => "Nhập sai quá 2 lần tài khoản của bạn sẽ bị khoá trong vòng 24 giờ nữa",
            ])->withInput();
        }
    }
    public function register(Request $request){
       return view('user.page.register');
    }
    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ], [
            'email.unique' => 'Email đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password_confirmation.same' => 'Mật khẩu nhập và mật khẩu xác nhận không giống nhau.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Tạo tài khoản người dùng mới
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Đăng nhập người dùng
        Auth::login($user);

        return redirect()->route('user.home');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.home');
    }

    public function myaccount(Request $request){
        $user = Auth::user();
        return view('user.page.my_account',compact('user'));
    }
    public function updateAccount(Request $request){
        // dd($request->all());
        $user = User::find($request->id);
        // dd($user);
        $request->validate([
            'name'=>'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|max:20|unique:users,phone_number,'.$user->id,
            'address' => 'required|string|max:255',
        ],[
            'email.unique'=>'Email đã được đăng ký, xin vui lòng đăng ký email khác',
            'phone.unique'=>'Số điện thoại đã đăng ký, xin vui lòng đăng ký số điện thoại khác'
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request['password']) {
            $user->password = bcrypt($request['password']);
        }
        $user->phone_number = $request['phone'];
        $user->address = $request['address'];
        $user->save();
        return redirect()->back()->with('success','Bạn đã cập nhật thành công');
    }
    public function addfavorite($product_id){
        $favorite = [
            'product_id'=>$product_id,
            'user_id'=>auth::user()->id,
        ];
        $favorited = Favorites::where(['product_id'=>$product_id,'user_id'=>Auth::user()->id])->first();;
        if ($favorited) {
                $favorited->delete();
                return redirect()->back()->with('success', 'Bạn đã bỏ yêu thích sản phẩm');
            }
         else {
            Favorites::create($favorite);
            return redirect()->back()->with('success', 'Bạn đã yêu thích sản phẩm');
        }

    }

    public function favorite(){
        $favorite = Auth::user()->favorites;
        return view('user.page.favorites',compact('favorite'));

    }
    public function bills(Request $request){
        $user = Auth()->user()->id;
        $bills = Bills::where('user_id',$user)->with('user', 'items.product')->get();
        // dd($bill);
        return view('user.page.bill_account',compact('bills'));
     }
     public function showbills($id){
        // $user = Auth()->user()->id;
        $bill = Bills::with('user', 'items.product')->find($id);
        // $bill = Bills::with('user', 'items.product')->find($id);
        // dd($bill);
        return view('user.page.detail_bill',compact('bill'));
     }

     public function billcancel($id){
        $bill = Bills::find($id);
        $bill->status = 5;
        $bill->save();

        return redirect()->back();

     }

}