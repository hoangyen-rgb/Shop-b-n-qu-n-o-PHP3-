@extends('layout.layoutadmin')
@section('titleadmin', 'Quản lý danh mục')
@section('contentadmin')
    <div class="toolbar">
        <div class="left">
            <div class="add-button">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 5.25C10.1778 5.25 9.90989 5.48215 9.85432 5.78829L9.84375 5.90625V9.84375H5.90625C5.54382 9.84375 5.25 10.1376 5.25 10.5C5.25 10.8221 5.48215 11.0901 5.78829 11.1457L5.90625 11.1562H9.84375V15.0938C9.84375 15.4561 10.1376 15.75 10.5 15.75C10.8221 15.75 11.0901 15.5178 11.1457 15.2117L11.1562 15.0938V11.1562H15.0938C15.4561 11.1562 15.75 10.8624 15.75 10.5C15.75 10.1778 15.5178 9.90989 15.2117 9.85432L15.0938 9.84375H11.1562V5.90625C11.1562 5.54382 10.8624 5.25 10.5 5.25Z"
                        fill="white" />
                </svg>
                <p><a href="{{ route('admin.category.add') }}" class="a" style="color: white" ;>Thêm sản phẩm</a></p>
            </div>
            <div class="search-bar">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.655 18.9989L16.6896 15.0452C17.969 13.4152 18.6632 11.4024 18.6607 9.33033C18.6607 7.48497 18.1134 5.68104 17.0882 4.14668C16.063 2.61231 14.6058 1.41642 12.9009 0.710233C11.196 0.00404265 9.31998 -0.180729 7.51007 0.179284C5.70017 0.539296 4.03766 1.42792 2.73279 2.73279C1.42792 4.03766 0.539296 5.70017 0.179284 7.51007C-0.180729 9.31998 0.00404265 11.196 0.710233 12.9009C1.41642 14.6058 2.61231 16.063 4.14668 17.0882C5.68104 18.1134 7.48497 18.6607 9.33033 18.6607C11.4024 18.6632 13.4152 17.969 15.0452 16.6896L18.9989 20.655C19.1073 20.7643 19.2363 20.8511 19.3784 20.9103C19.5205 20.9695 19.673 21 19.8269 21C19.9809 21 20.1334 20.9695 20.2755 20.9103C20.4176 20.8511 20.5466 20.7643 20.655 20.655C20.7643 20.5466 20.8511 20.4176 20.9103 20.2755C20.9695 20.1334 21 19.9809 21 19.8269C21 19.673 20.9695 19.5205 20.9103 19.3784C20.8511 19.2363 20.7643 19.1073 20.655 18.9989ZM2.33259 9.33033C2.33259 7.94631 2.743 6.59337 3.51192 5.44259C4.28084 4.29182 5.37374 3.3949 6.65241 2.86526C7.93108 2.33561 9.33809 2.19704 10.6955 2.46705C12.053 2.73705 13.2998 3.40353 14.2785 4.38218C15.2571 5.36083 15.9236 6.60771 16.1936 7.96514C16.4636 9.32257 16.325 10.7296 15.7954 12.0083C15.2658 13.2869 14.3688 14.3798 13.2181 15.1487C12.0673 15.9177 10.7144 16.3281 9.33033 16.3281C7.47441 16.3281 5.69451 15.5908 4.38218 14.2785C3.06985 12.9662 2.33259 11.1862 2.33259 9.33033Z"
                        fill="#4E4E4E" />
                </svg>
                <input type="text" placeholder="Tìm kiếm">
            </div>
        </div>
        <div class="right">
            <div class="filter-button">
                <p>Lọc</p>
                <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.8 13.6C15.4627 13.6 16 14.1373 16 14.8C16 15.4627 15.4627 16 14.8 16H7.6C6.93726 16 6.4 15.4627 6.4 14.8C6.4 14.1373 6.93726 13.6 7.6 13.6H14.8ZM18 6.8C18.6627 6.8 19.2 7.33726 19.2 8C19.2 8.66274 18.6627 9.2 18 9.2H4.4C3.73726 9.2 3.2 8.66274 3.2 8C3.2 7.33726 3.73726 6.8 4.4 6.8H18ZM21.2 0C21.8627 0 22.4 0.537258 22.4 1.2C22.4 1.86274 21.8627 2.4 21.2 2.4H1.2C0.537258 2.4 0 1.86274 0 1.2C0 0.537258 0.537258 0 1.2 0H21.2Z"
                        fill="#4E4E4E" />
                </svg>

            </div>
            <div class="sort-button">
                <p>Sắp xếp</p>
                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.99738 1.19536e-05C5.25497 -0.00124343 5.5143 0.0963824 5.71083 0.292915L9.72189 4.30398C10.1124 4.69449 10.1124 5.32766 9.72189 5.71818C9.33138 6.1087 8.69821 6.1087 8.30769 5.71818L5.99738 3.40787V15C5.99738 15.5522 5.54966 15.9999 4.99738 15.9999C4.44511 15.9999 3.99739 15.5522 3.99739 15V3.42187L1.70709 5.71216C1.31657 6.10269 0.683417 6.10269 0.292899 5.71216C-0.0976329 5.32164 -0.0976329 4.68848 0.292899 4.29795L4.22048 0.370355C4.40383 0.144422 4.68374 1.19536e-05 4.99738 1.19536e-05ZM16.3332 2.30797e-05C16.8856 2.30797e-05 17.3332 0.447741 17.3332 1.00002V12.5781L19.6236 10.2879C20.0141 9.89732 20.6472 9.89732 21.0377 10.2879C21.4282 10.6784 21.4282 11.3115 21.0377 11.702L17.1101 15.6296C16.9268 15.8556 16.6469 16 16.3332 16C16.0757 16.0013 15.8164 15.9036 15.6199 15.707L11.6087 11.696C11.2183 11.3055 11.2183 10.6724 11.6087 10.2819C11.9992 9.89132 12.6324 9.89132 13.0229 10.2819L15.3332 12.5921V1.00002C15.3332 0.447741 15.7809 2.30797e-05 16.3332 2.30797e-05Z"
                        fill="#4E4E4E" />
                </svg>

            </div>
        </div>
    </div>
    <style>
        .toolbar {
            width: 100%;
            display: grid;
            height: 35px;
            grid-template-columns: repeat(2, 50%);
            margin-bottom: 15px;
        }

        .toolbar .left {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
        }

        .toolbar .right {
            grid-column: 2 /3;
            grid-row: 1 / 2;
        }

        .toolbar .left *,
        .toolbar .right * {
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
        }

        .toolbar .add-button {
            background-color: var(--red);
            padding: 0px 5px;
            height: 100%;
            padding: 7px;
            border-radius: 5px;
        }

        .toolbar .add-button p {
            color: white;
            margin-left: 10px;
            font-weight: 600;
            line-height: 15px;
        }

        .toolbar .search-bar {
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid var(--gray);
            margin-left: 10px;
            height: 100%;
        }

        .toolbar .search-bar input {
            border: unset;
            outline: none;
        }

        .right {
            text-align: right;
        }

        .right .filter-button {
            margin-right: 20px;
        }

        .right p {
            margin-left: 10px;
        }

        .list-product {
            background-color: white;
            border: 1px solid var(--gray);
            border-radius: 10px;
        }

        .list-product,
        .list-product table {
            width: 100%;
        }

        .list-product table td:nth-child(1) {
            width: 5%;
        }

        .list-product table td:nth-child(2) {
            width: 15%;
        }

        .list-product table td:nth-child(3) {
            width: 25%;
        }

        .list-product table td:nth-child(4) {
            width: 20%;
        }

        .list-product table td:nth-child(5) {
            width: 15%;
        }

        .list-product table td:nth-child(6) {
            width: 20%;
        }

        .list-product table tr:first-child td,
        .list-product table tr td:first-child,
        .list-product table tr td:last-child {
            text-align: center;
        }

        .list-product .product-image img {
            width: 75px;
            height: 75px;
            border-radius: 5px;
            overflow: hidden;
        }

        .list-product table {

            border-collapse: collapse;
        }

        .list-product table td,
        .cart table th {
            padding: 10px;
            text-align: center;
        }

        .list-product table tr:first-child {
            height: 50px;
        }

        .list-product table tr:not(:last-child) {
            border-bottom: 1px solid var(--gray);
        }

        .list-product table tr {
            height: 100px;
        }

        .product-action>* {
            background-color: var(--red);
            width: 30px;
            height: 30px;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
            vertical-align: middle;
            margin: 0px 5px;
            cursor: pointer;
        }

        .product-name {
            text-align: left !important;
        }
    </style>
    @if ($message = Session::get('suscess'))
        <strong>{{ $message }}</strong>
    @endif
    <div class="list-product">
        <table>
            <tr>
                <td>STT</td>
                <td>Tên danh mục</td>
                <td>Danh mục cha</td>
                <td>Ngày tạo</td>
                <td>Trạng thái</td>
                <td>Tuỳ chọn</td>
            </tr>
            @foreach ($categories as $item)
                <tr>
                    <td class="product-checkbox">
                        {{ $loop->iteration }}
                    </td>
                    <td class="product-name">{{ $item->name }}</td>
                    <td class="product-price">{{ $item->parent ? $item->parent['name'] : '' }}</td>
                    <td class="product-category">{{ $item->created_at }}</td>
                    <td class="product-category">
                        {!! $item->status ? '<span class="ladel-success">Hiển thị</span>' : '<span class="label ladel-danger">Ẩn</span>' !!}
                    </td>
                    <td class="product-action">
                        <div class="edit-button">
                            <a href="{{ route('admin.category.edit', $item) }}" class="a">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4042 3.28224L12.6642 0.542241C12.3066 0.206336 11.838 0.0135995 11.3475 0.000692758C10.8571 -0.012214 10.379 0.15561 10.0042 0.472241L1.0042 9.47224C0.680969 9.79821 0.479707 10.2254 0.434203 10.6822L0.00420295 14.8522C-0.00926809 14.9987 0.00973728 15.1463 0.0598642 15.2846C0.109991 15.4229 0.190005 15.5484 0.294203 15.6522C0.387643 15.7449 0.498459 15.8182 0.620297 15.868C0.742134 15.9178 0.872596 15.943 1.0042 15.9422H1.0942L5.2642 15.5622C5.721 15.5167 6.14824 15.3155 6.4742 14.9922L15.4742 5.99224C15.8235 5.62321 16.0123 5.13075 15.9992 4.62278C15.9861 4.1148 15.7721 3.63275 15.4042 3.28224ZM5.0842 13.5622L2.0842 13.8422L2.3542 10.8422L8.0042 5.26224L10.7042 7.96224L5.0842 13.5622ZM12.0042 6.62224L9.3242 3.94224L11.2742 1.94224L14.0042 4.67224L12.0042 6.62224Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                        <a class="remove-button" href="{{ route('admin.category.delete', $item) }}">
                            <svg width="17" height="20" viewBox="0 0 17 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 4.32397C0 4.5755 0.0999182 4.81672 0.277774 4.99458C0.455629 5.17243 0.696853 5.27235 0.948379 5.27235H1.45418V16.479C1.45502 17.3065 1.78406 18.0999 2.36913 18.6851C2.95419 19.2702 3.74749 19.5994 4.57498 19.6005H12.425C13.2525 19.5994 14.0458 19.2702 14.6309 18.6851C15.2159 18.0999 15.545 17.3065 15.5458 16.479V5.27235H16.0516C16.3031 5.27235 16.5444 5.17243 16.7222 4.99458C16.9001 4.81672 17 4.5755 17 4.32397C17 4.07245 16.9001 3.83122 16.7222 3.65337C16.5444 3.47551 16.3031 3.37559 16.0516 3.37559H12.7323V2.39687C12.7323 1.07546 11.6575 0 10.3361 0H6.66394C5.34253 0 4.2677 1.07483 4.2677 2.39687V3.37496H0.948379C0.696853 3.37496 0.455629 3.47488 0.277774 3.65274C0.0999182 3.83059 0 4.07245 0 4.32397ZM6.16446 2.3975C6.16446 2.12121 6.38828 1.89739 6.66394 1.89739H10.3361C10.6117 1.89739 10.8355 2.12121 10.8355 2.3975V3.37559H6.16383V2.39687L6.16446 2.3975ZM3.35094 5.27235H13.6491V16.479C13.6487 16.8036 13.5197 17.1148 13.2902 17.3444C13.0608 17.574 12.7496 17.7032 12.425 17.7037H4.57498C4.25039 17.7032 3.93924 17.574 3.70978 17.3444C3.48032 17.1148 3.35127 16.8036 3.35094 16.479V5.27235Z"
                                    fill="white" />
                                <path
                                    d="M6.14284 15.9568C6.39436 15.9568 6.63559 15.8569 6.81344 15.679C6.9913 15.5012 7.09121 15.26 7.09121 15.0084V7.96767C7.09121 7.71614 6.9913 7.47492 6.81344 7.29706C6.63559 7.11921 6.39436 7.01929 6.14284 7.01929C5.89131 7.01929 5.65009 7.11921 5.47223 7.29706C5.29438 7.47492 5.19446 7.71614 5.19446 7.96767V15.0084C5.19446 15.26 5.29438 15.5012 5.47223 15.679C5.65009 15.8569 5.89131 15.9568 6.14284 15.9568ZM10.8569 15.9568C11.1084 15.9568 11.3497 15.8569 11.5275 15.679C11.7054 15.5012 11.8053 15.26 11.8053 15.0084V7.96767C11.8053 7.71614 11.7054 7.47492 11.5275 7.29706C11.3497 7.11921 11.1084 7.01929 10.8569 7.01929C10.6054 7.01929 10.3642 7.11921 10.1863 7.29706C10.0084 7.47492 9.90853 7.71614 9.90853 7.96767V15.0084C9.90853 15.26 10.0084 15.5012 10.1863 15.679C10.3642 15.8569 10.6054 15.9568 10.8569 15.9568Z"
                                    fill="white" />
                            </svg>

                        </a>
                    </td>
                </tr>
            @endforeach
            {{-- @foreach ($categories as $item) --}}

            {{-- @endforeach --}}


        </table>
    </div>
    {{ $categories->links($view) }}
@endsection
