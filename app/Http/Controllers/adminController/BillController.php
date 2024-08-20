<?php

namespace App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Bills;

class BillController extends Controller
{
    public function view(Request $request)
    {
        $tab = request()->input('tab', 'new');
        // dd($tab);

        $billsModel = new Bills();

        switch ($tab) {
            case 'cancelled':
                $bills = $billsModel->get_bill_by_status(5)->get();
                break;
            case 'delivering':
                $bills = $billsModel->get_bill_by_status(3)->get();
                break;
            case 'preparing':
                $bills = $billsModel->get_bill_by_status(2)->get();
                break;
            default:
                $bills = $billsModel->get_bill_by_status(1)->get();
                break;
        }
        $bill = null;
        if ($request->has('id')) {
            $bill = Bills::with('user', 'items.product')->find($request->input('id'));
        }

        return view('admin.page.billmanage', compact('bills', 'tab','bill'));
    }

    public function cancel($id)
    {
        $bill = Bills::find($id);
        $bill->status = 5;
        $bill->save();

        return redirect()->back();
    }
    // Xác nhận
    public function complete($id)
    {
        $bill = Bills::find($id);
        $bill->status = 2;
        $bill->save();

        return redirect()->back();
    }
    // Giao Hàng
    public function accept($id)
    {
        $bill = Bills::find($id);
        $bill->status = 3;
        $bill->save();

        return redirect()->back();
    }
    // Giao thành công

    public function deliver($id)
    {
        $bill = Bills::find($id);
        $bill->status = 4;
        $bill->save();

        return redirect()->back();
    }
}