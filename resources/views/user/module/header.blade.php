<header class="header_area header_cart_page ">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-9 col-md-12">
                    <div class="welcome_text">
                        <ul>
                            <li><span>Địa chỉ:</span> K9/1B, Ấp 1A, Xã hoà phú, Huyện Củ Chi</li>
                            <li><span>Email:</span> dphyen10012004@gmail.com</li>
                            <li><span>Phone:</span> +389 511 390</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="top_right text-right">
                        <ul>
                            @if (Auth::user())
                                <li class="top_links"><a href="{{ route('user.myaccount') }}">Tài khoản của bạn <i
                                            class="ion-chevron-down"></i></a>
                                @else
                                <li class="top_links"><a href="{{ route('user.login') }}">Đăng nhập <i
                                            class="ion-chevron-down"></i></a>
                            @endif
                            <ul class="dropdown_links">
                                {{-- <li><a href="wishlist.html">My Wish List </a></li> --}}


                                @if (Auth::user())
                                    <li><a href="{{ route('user.myaccount') }}">Tài khoản của bạn </a></li>
                                    <li><a href="{{ route('user.favorite') }}">Yêu Thích</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                @else
                                    <li><a href="{{ route('user.login') }}">Đăng nhập</a></li>
                                @endif
                            </ul>
                            </li>
                            {{-- <li class="language"><a class=""><img src="site/img/logo/language.png" alt="">
                                    English <i class="ion-chevron-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="site/img/logo/cigar.jpg" alt="">
                                            French</a></li>
                                    <li><a href="#"><img src="site/img/logo/language2.png"
                                                alt="">German</a></li>
                                </ul>
                            </li>
                            <li class="currency"><a href="#">USD <i class="ion-chevron-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">BRL</a></li>
                                </ul>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-5">
                    <div class="logo">
                        <a href="/"><img src="site/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="search_bar">
                        <form action="{{ route('shop.search') }}" method="GET">
                            {{-- <select class="select_option" name="select" style="display: none;">
                                <option selected="" value="1">Tất cả</option>
                                <option value="3">Áo dành cho nam</option>
                                <option value="3">Áo dành cho nữ</option>
                                <option value="3">Áo dành cho trẻ em</option>
                                <option value="3">Giày</option>
                            </select> --}}
                            <div class="nice-select select_option" tabindex="0"><span class="current">Tất cả</span>
                                <ul class="list">
                                    <li data-value="1" class="option selected focus">Tất cả</li>
                                    <li data-value="2" class="option">Nón</li>
                                    <li data-value="3" class="option">Áo dành cho nam</li>
                                    <li data-value="3" class="option">Áo dành cho nữ</li>
                                    <li data-value="3" class="option">Áo dành cho trẻ em</li>
                                    <li data-value="5" class="option">Giày</li>
                                </ul>
                            </div>

                            <input placeholder="Tìm mọi thứ ở đây..." type="text" name="search">
                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 offset-md-6 offset-lg-0">
                    <div class="cart_area">
                        <div class="middel_links">
                            <ul>
                                {{-- @dd(Auth::user()) --}}
                                @if (Auth::user())
                                    <li><a href="{{ route('user.logout') }}">Đăng Xuất</a></li>
                                @else
                                    <li><a href="{{ route('user.login') }}">Đăng nhập</a></li>
                                    <li>/</li>
                                    <li><a href="{{ route('user.register') }}">Đăng ký</a></li>
                                @endif
                            </ul>

                        </div>
                        <div class="cart_link">
                            {{-- @dd($cart); --}}
                            @if (auth::user())
                                <a href="#"><i class="fa fa-shopping-basket"></i>
                                    {{-- {{ $cart->totalQuantity }}</a> --}}
                                    <!--mini cart-->

                                    <div class="mini_cart">

                                        @foreach ($cart as $item)
                                            <div class="cart_item top">
                                                <div class="cart_img">
                                                    <a href="#"><img
                                                            src="{{ asset('site/img/gallery') }}/{{ $item->image }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{ $item->name }}</a>

                                                    <span>{{ $item->quantity }}x
                                                        {{ number_format($item->price, 0, '.', ',') }}
                                                        VNĐ</span>

                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="cart__table">
                                            <table>
                                                <tbody>
                                                    {{-- @dd($cart); --}}
                                                    <tr>
                                                        <td class="text-left">Số lượng:</td>
                                                        {{-- <td class="text-right">{{ $cart->totalQuantity }}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Tổng cộng :</td>
                                                <td class="text-right">
                                                    {{ number_format($cart->totalPrice, 0, '.', ',') }} VNĐ</td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="cart_button view_cart">
                                            <a href="/cart">Xem giỏ hàng</a>
                                        </div>
                                        <div class="cart_button checkout">
                                            <a href="/checkout">Thanh toán</a>
                                        </div>
                                    </div>
                            @endif

                            <!--mini cart end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header_static">
                        <div class="main_menu_inner">
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li><a href="/">Trang Chủ </i></a>

                                        </li>
                                        <li class="mega_items active"><a href="/shop">Sản phẩm</a>
                                        </li>
                                        <li><a href="/about">Về chúng tôi</a></li>
                                        <li><a href="/contact">Liên hệ với chúng tôi</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="contact_phone">
                            <p>Gọi hỗ trợ miễn phí: <a href="tel:01234567890">01234567890</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</header>
