@extends('layout.layoutadmin')
@section('titleadmin', 'Thêm danh mục')
@section('contentadmin')
    <!-- style trang -->
    <style>
        header {
            position: fixed;
            width: 100%;
            border-bottom: 1px solid var(--gray);
            display: grid;
            grid-template-columns: 250px 50px auto;
            height: 70px;
        }

        header svg {
            cursor: pointer;

        }

        .logo {

            border-bottom: 1px solid var(--gray);
            background: linear-gradient(270deg, var(--red) 1.51%, var(--yellow) 97.91%);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        header .logo>img {
            width: 150px;
            height: auto;
            border: unset;
            background: unset;
        }

        header .left {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header .right {
            display: flex;
            justify-content: end;
            align-items: center;

        }

        header .right>* {
            margin: 0px 20px;
        }

        header .right .avt {
            border-radius: 50%;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            border-right: 1px solid var(--gray);
            background-color: white;
            position: fixed;
            top: 70px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }

        .sidebar ul li {
            box-sizing: border-box;
            height: 60px;
            padding-left: 20px;
            color: var(--lightblack);
            display: flex;
            justify-content: start;
            align-items: center;
            position: relative;
            font-size: 18px;
            font-weight: 600;
        }

        .sidebar ul li:hover {
            cursor: pointer;
            background-color: rgb(245, 245, 245);
        }

        .sidebar ul li svg {
            margin-right: 10px;
        }

        .sidebar ul li svg path {

            fill: var(--lightblack);
        }

        .topbar {
            width: 100%;
            background-color: white;
            border-bottom: 1px solid var(--gray);
        }

        .sidebar ul>:not(.selected) .border {
            display: none;
        }

        .sidebar ul>.selected .border {
            display: block;
            position: absolute;
            left: 0px;
            width: 4px;
            height: 70%;
            border-radius: 2px;
            background-color: var(--red);
        }

        .sidebar .selected span,
        .sidebar .selected svg path {
            color: var(--red);
            fill: var(--red);
        }

        .has-error {
            color: var(--red);
        }

        .form-error {
            border-color: #dc3545 !important;
        }
    </style>
    <style>
        .toolbar {
            width: 100%;
            height: 35px;
            margin-bottom: 15px;
            text-align: right;
        }

        .toolbar .right>* {
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
        }

        .toolbar .right {
            width: 100%;
            height: 100%;
        }

        .toolbar .right .save-button,
        .toolbar .right .cancel-button {

            margin-left: 20px;
            height: 100%;
            background-color: var(--red);
            border-radius: 5px;
            color: white;
            width: 100px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            font-weight: 600;
        }

        .toolbar .right p {
            margin-left: 10px;
        }

        .container {
            width: 100%;
            display: grid;
            grid-template-columns: 60% 475px;
            gap: 20px;
            height: 440px;
        }

        .container .left {
            display: grid;
            grid-template-columns: repeat(3, auto);
            grid-template-rows: 30px 40px 30px auto 30px 40px;
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--gray);
            padding: 10px;
            align-items: center;

        }

        .container .left label {
            font-size: 18px;
            margin-left: 10px;
        }

        .container .left :is(input, select, textarea) {
            margin: 0px 10px;
            height: 100%;
            resize: none;
            border-radius: 5px;
            outline: none !important;
            border: 1px solid var(--gray);
            padding: 10px;
        }

        .container .left input[type="checkbox"] {
            width: 30px;
            height: 30px;
        }

        .container .left div {
            text-align: center;
        }

        .container .left div>* {
            display: inline-block;
            vertical-align: middle;
            margin: 0px 10px;
        }

        .container .right {
            height: 100%;
            padding: 10px;
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--gray);
            overflow: hidden;
            display: grid;
            grid-template-rows: auto 40px;
            gap: 20px;
        }

        .container .right .img-box {
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid var(--gray);
            background-image: url(/content/image/background-blank.jpg);
            text-align: center;
            position: relative;
        }

        .container .right .img-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            /* Màu đen hơi trong suốt */
        }

        .container .right img {
            height: 100%;
        }

        .container .right label {
            padding: 10px;
            background-color: var(--red);
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
        }

        .container .right label>* {
            margin: 0px 5px;
        }
    </style>
    <form action="{{ route('admin.category.store') }}" role="form" method="POST">
        @csrf
        <div class="toolbar">
            <div class="left">
            </div>
            <div class="right">
                <div class="cancel-button">
                    <p>Hủy</p>
                </div>


                <div class="save-button">
                    <button type="submit">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 5.25C10.1778 5.25 9.90989 5.48215 9.85432 5.78829L9.84375 5.90625V9.84375H5.90625C5.54382 9.84375 5.25 10.1376 5.25 10.5C5.25 10.8221 5.48215 11.0901 5.78829 11.1457L5.90625 11.1562H9.84375V15.0938C9.84375 15.4561 10.1376 15.75 10.5 15.75C10.8221 15.75 11.0901 15.5178 11.1457 15.2117L11.1562 15.0938V11.1562H15.0938C15.4561 11.1562 15.75 10.8624 15.75 10.5C15.75 10.1778 15.5178 9.90989 15.2117 9.85432L15.0938 9.84375H11.1562V5.90625C11.1562 5.54382 10.8624 5.25 10.5 5.25Z"
                                fill="white" />
                        </svg>
                        <p>Lưu</p>
                    </button>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="left">
                <label for="product-name">Tên danh mục</label>
                <input @error('name')
            class="form-error"
            @enderror type="text" id="product-name"
                    name="name" style="grid-row: 2 / 3;">
                @error('name')
                    <div class="help-block has-error">{{ $message }}</div>
                @enderror
                <label for="product-name">Chọn danh Menu cha</label>
                <select style="grid-row: 2 / 3;" name="parent_id">
                    <?php $category = new \App\Models\categories(); ?>
                    {!! $category->categoryParent($categories, $category->id) !!}

                </select>
                {{-- <input type="text" id="product-name" style="grid-row: 2 / 3;" name="parent_id"> --}}
                <label for="product-name">Chọn trạng thái</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" id="input" value="1" checked="checked"> Hiện
                    </label>
                    <label for="">
                        <input type="radio" name="status" id="input" value="0"> Ẩn
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection
