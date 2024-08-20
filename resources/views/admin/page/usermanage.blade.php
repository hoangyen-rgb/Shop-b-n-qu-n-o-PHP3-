@extends('layout.layoutadmin')
@section('titleadmin', 'Quản lý người dùng')
@section('contentadmin')

    <!-- style trang -->
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

        .toolbar .search-bar {
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid var(--gray);
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

        .list-user {
            background-color: white;
            border: 1px solid var(--gray);
            border-radius: 10px;
        }

        .list-user,
        .list-user table {
            width: 100%;
        }

        .list-user table td:nth-child(1) {
            width: 5%;
        }

        .list-user table td:nth-child(2) {
            width: 10%;
        }

        .list-user table td:nth-child(3) {
            width: 45%;
            text-align: left;
        }

        .list-user table td:nth-child(4) {
            width: 20%;
        }

        .list-user table td:nth-child(6) {
            width: 20%;
        }

        .list-user table tr:first-child td,
        .list-user table tr td:first-child,
        .list-user table tr td:last-child {
            text-align: center;
        }

        .list-user .user-image img {
            width: 75px;
            height: 75px;
            border-radius: 5px;
            overflow: hidden;
        }

        .list-user table {

            border-collapse: collapse;
        }

        .list-user table td,
        .cart table th {
            padding: 10px;
            text-align: center;
        }

        .list-user table tr:first-child {
            height: 50px;
        }

        .list-user table tr:not(:last-child) {
            border-bottom: 1px solid var(--gray);
        }

        .list-user table tr {
            height: 100px;
        }

        .user-role {}

        .user-role>div {
            padding: 5px 15px;
            border-radius: 15px;
            color: white;
            width: fit-content;
            margin: 0px auto;
        }

        .user-action>* {
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
    </style>
    <div class="toolbar">
        <div class="left">
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
    <div class="list-user">
        <table>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>Hình ảnh</td>
                <td>Email</td>
                <td>Vai trò</td>
                <td>Hành động</td>
            </tr>
            <tr>
                <td class="user-checkbox"><input type="checkbox" name="" id=""></td>
                <td class="user-image"><img src="" alt=""></td>
                <td class="user-name">admin@gmail.com</td>
                <td class="user-role">
                    <div style="background-color: var(--red);">Quản trị</div>
                    {{-- <div style="background-color: var(--green);">Khách hàng</div> --}}

                </td>
                <td class="user-action">
                    <a class="view-button" href="/thongtinnguoidung?id">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.4 0C4.58182 0 1.32109 2.488 0 6C1.32109 9.512 4.58182 12 8.4 12C12.222 12 15.4789 9.512 16.8 6C15.4789 2.488 12.222 0 8.4 0ZM8.4 10C6.29236 10 4.58182 8.208 4.58182 6C4.58182 3.792 6.29236 2 8.4 2C10.5076 2 12.2182 3.792 12.2182 6C12.2182 8.208 10.5076 10 8.4 10ZM8.4 3.6C7.13618 3.6 6.10909 4.676 6.10909 6C6.10909 7.324 7.13618 8.4 8.4 8.4C9.66382 8.4 10.6909 7.324 10.6909 6C10.6909 4.676 9.66382 3.6 8.4 3.6Z"
                                fill="white" />
                        </svg>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="user-checkbox"><input type="checkbox" name="" id=""></td>
                <td class="user-image"><img src="" alt=""></td>
                <td class="user-name">user@gmail.com</td>
                <td class="user-role">
                    {{-- <div style="background-color: var(--red);">Quản trị</div> --}}
                    <div style="background-color: var(--green);">Khách hàng</div>

                </td>
                <td class="user-action">
                    <a class="view-button" href="/thongtinnguoidung?id">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.4 0C4.58182 0 1.32109 2.488 0 6C1.32109 9.512 4.58182 12 8.4 12C12.222 12 15.4789 9.512 16.8 6C15.4789 2.488 12.222 0 8.4 0ZM8.4 10C6.29236 10 4.58182 8.208 4.58182 6C4.58182 3.792 6.29236 2 8.4 2C10.5076 2 12.2182 3.792 12.2182 6C12.2182 8.208 10.5076 10 8.4 10ZM8.4 3.6C7.13618 3.6 6.10909 4.676 6.10909 6C6.10909 7.324 7.13618 8.4 8.4 8.4C9.66382 8.4 10.6909 7.324 10.6909 6C10.6909 4.676 9.66382 3.6 8.4 3.6Z"
                                fill="white" />
                        </svg>
                    </a>
                </td>
            </tr>
        </table>

    </div>
@endsection
