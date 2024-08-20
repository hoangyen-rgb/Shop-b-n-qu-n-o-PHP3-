@extends('layout.layoutadmin')
@section('titleadmin', 'Quản lý đơn hàng')
@section('contentadmin')
    <style>
        .container {
            width: 100%;
            height: calc(100vh - 85px);
            display: grid;
            grid-template-columns: 430px auto;
            gap: 20px;
        }

        .left {
            display: grid;
            grid-template-rows: 50px auto;
            gap: 10px;
            height: 100%;
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow-y: scroll;
        }

        .left .tab {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background-color: white;
            border-radius: 10px;
            gap: 5px;
            border: 1px solid var(--gray);
            box-shadow: 0px 0px 4px var(--gray);
            overflow: hidden;
        }

        .left .tab a {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;

        }

        .selected {
            background-color: var(--red);
            border-radius: 10px;
            color: #FFFF;
            font-weight: bold;
        }

        .list-orders {
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow: hidden;
            overflow-y: scroll;
        }

        .list-orders .order {
            height: 100px;
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--gray);
            padding: 0px 20px;
            display: grid;
            grid-template-columns: 220px auto;
            row-gap: 10px;
        }

        .list-orders>:not(:last-child) {
            margin-bottom: 20px;
        }

        .list-orders .order .id {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            align-self: self-end;
            font-size: 20px;
            font-weight: 400;
        }

        .list-orders a {
            padding: 2%;
        }

        .list-orders .order .time {
            grid-column: 1 / 2;
            grid-row: 2 / 3;
            font-size: 16px;
            font-weight: 400;
        }

        .list-orders .order .price {
            grid-column: 2 / 3;
            grid-row: 1 / 3;
            font-size: 20px;
            font-weight: 600;
            align-self: center;
            justify-self: end;
        }

        .right {
            display: grid;
            grid-template-rows: auto 35px;
            height: 100%;
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow-y: scroll;
        }

        .order-detail {
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--gray);
            padding: 20px;
            padding-bottom: 0px;
            display: grid;
            grid-template-rows: 30px 60px auto;
            gap: 10px;
            height: fit-content;
        }

        .order-detail>.title {
            font-size: 20px;
            font-weight: 600;
        }

        .order-detail>.order-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .order-detail>.order-info>* {
            padding: 0px 20px;
            border-left: 1px solid var(--gray);
        }

        .order-detail>.order-info>:is(:last-child) {
            border-right: 1px solid var(--gray);
        }

        .product-list {
            width: 100%;
        }

        .product-list .product {
            height: 100px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        }


        .product-list .product td:not(:first-child) {

            text-align: center;
        }

        .product-list .product td {
            font-size: 20px;
            font-weight: 400;
            align-self: center;

        }

        .right .buttons p {
            width: 100%;
            display: flex;
            justify-content: end;
            align-items: center;
            margin-top: 20px;
        }

        .right .buttons p a {
            width: 100px;
            /* padding: 5%; */
            height: 35px;
            background-color: var(--red);
            color: white;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            margin-left: 20px;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="left">
            <div class="tab">
                <a href="{{ route('admin.bill', ['tab' => 'new']) }}" class="{{ $tab == 'new' ? 'selected' : '' }}">Mới</a>
                <a href="{{ route('admin.bill', ['tab' => 'preparing']) }}"
                    class="{{ $tab == 'preparing' ? 'selected' : '' }}">Chuẩn bị</a>
                <a href="{{ route('admin.bill', ['tab' => 'delivering']) }}"
                    class="{{ $tab == 'delivering' ? 'selected' : '' }}">Giao hàng</a>
                <a href="{{ route('admin.bill', ['tab' => 'cancelled']) }}"
                    class="{{ $tab == 'cancelled' ? 'selected' : '' }}">Hủy</a>
            </div>
            <div class="list-orders">
                @foreach ($bills as $item)
                    <a href="{{ route('admin.bill', ['tab' => $tab, 'id' => $item->id]) }}">
                        <div class="order">
                            <p class="id">Đơn hàng {{ $item->id }}</p>
                            <p class="time">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.5 15C3.3642 15 0 11.6358 0 7.5C0 3.3642 3.3642 0 7.5 0C11.6358 0 15 3.3642 15 7.5C15 11.6358 11.6352 15 7.5 15ZM7.5 1.2C4.026 1.2 1.2 4.026 1.2 7.5C1.2 10.974 4.026 13.8 7.5 13.8C10.974 13.8 13.8 10.974 13.8 7.5C13.8 4.026 10.9734 1.2 7.5 1.2ZM7.452 8.052H3.6C3.44087 8.052 3.28826 7.98879 3.17574 7.87626C3.06321 7.76374 3 7.61113 3 7.452C3 7.29287 3.06321 7.14026 3.17574 7.02774C3.28826 6.91521 3.44087 6.852 3.6 6.852H6.852V2.4C6.852 2.24087 6.91521 2.08826 7.02774 1.97574C7.14026 1.86321 7.29287 1.8 7.452 1.8C7.61113 1.8 7.76374 1.86321 7.87627 1.97574C7.98879 2.08826 8.052 2.24087 8.052 2.4V7.452C8.052 7.61113 7.98879 7.76374 7.87627 7.87626C7.76374 7.98879 7.61113 8.052 7.452 8.052Z"
                                        fill="#BDBDBD" />
                                </svg>
                                <span>
                                    {{ round(\Carbon\Carbon::now()->diffInMinutes($item->created)) }} phút trước </span>
                            </p>
                            <p class="price">{{ number_format($item->total, 0, ',', '.') }} VNĐ</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="right">

            <div class="order-detail-box">
                @if (!empty($bill))
                    <div class="order-detail">
                        <p class="title">Thông tin đơn hàng</p>
                        <div class="order-info">
                            <div class="time">
                                <p class="title">Thông tin khách hàng:</p>
                                <p class="detail">Tên: {{ $bill->user->name }}</p>
                                <p class="detail">SĐT: {{ $bill->user->phone_number }}</p>
                            </div>
                            <div class="address">
                                <p class="title">Địa chỉ:</p>
                                <p class="detail">{{ $bill->user->name }}</p>
                            </div>
                            <div class="phonenumber">
                                <p class="title">Ghi chú:</p>
                                <p class="detail">{{ $bill->note }}</p>
                            </div>
                        </div>
                        <table class="product-list">
                            <tr class="product">
                                <td>
                                    Tên
                                </td>
                                <td>
                                    Số lượng
                                </td>
                                <td>
                                    Kích thước
                                </td>
                                <td>
                                    Màu sắc
                                </td>
                                <td>
                                    Tổng giá
                                </td>
                            </tr>
                            {{-- @dd($bill) --}}
                            @foreach ($bill->items as $item)
                                <tr class="product">
                                    <td>
                                        {{ $item->product->name }}
                                    </td>
                                    <td>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        {{ $item->size }}
                                    </td>
                                    <td>
                                        {{ $item->color }}
                                    </td>
                                    <td>
                                        {{ $item->product->price_sale > 0 ? $item->product->price_sale : $item->product->price }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    @if ($tab == 'preparing')
                        <div class="buttons">

                            <p><a href="{{ route('admin.bill.cancel', $bill->id) }}">Hủy Đơn</a></p>


                            <p><a href="{{ route('admin.bill.accept', $bill->id) }}">Giao Hàng</a></p>
                        </div>
                    @elseif($tab == 'delivering')
                        <div class="buttons">

                            <p><a href="{{ route('admin.bill.cancel', $bill->id) }}">Hủy Đơn</a></p>


                            <p><a href="{{ route('admin.bill.deliver', $bill->id) }}">Đã Giao</a></p>
                        </div>
                    @elseif($tab == 'cancelled')
                    @else
                        <div class="buttons">
                            <p><a href="{{ route('admin.bill.cancel', $bill->id) }}">Hủy Đơn</a></p>
                            <p><a href="{{ route('admin.bill.complete', $bill->id) }}">Nhận Đơn</a></p>
                        </div>
                    @endif
            </div>
            @endif
        </div>

    </div>


    </div>
@endsection
