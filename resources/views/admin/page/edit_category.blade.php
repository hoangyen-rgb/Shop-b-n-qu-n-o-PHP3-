@extends('layout.layoutadmin')
@section('titleadmin', 'Sửa danh mục')
@section('contentadmin')
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
            color: white !important;
            width: 100px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            font-weight: 600;
        }

        .toolbar .right .save-button svg {
            margin-right: 10px;
        }

        .container {
            width: 100%;
            display: grid;
            grid-template-columns: auto 475px;
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
            row-gap: 10px;

        }

        .container .left label {
            font-size: 18px;
            margin-left: 10px;
            margin-bottom: -5px;
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
            background-image: url('/background-blank.jpg');
            text-align: center;
            position: relative;
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
    <form method="post" action="{{ route('admin.category.update', $category) }}">
        @csrf
        <div class="toolbar">
            <div class="left">

            </div>
            <div class="right">
                <a class="cancel-button" href="productmanage">
                    Hủy
                </a>
                <button class="save-button" type="submit" name="edit_product">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 5.25C10.1778 5.25 9.90989 5.48215 9.85432 5.78829L9.84375 5.90625V9.84375H5.90625C5.54382 9.84375 5.25 10.1376 5.25 10.5C5.25 10.8221 5.48215 11.0901 5.78829 11.1457L5.90625 11.1562H9.84375V15.0938C9.84375 15.4561 10.1376 15.75 10.5 15.75C10.8221 15.75 11.0901 15.5178 11.1457 15.2117L11.1562 15.0938V11.1562H15.0938C15.4561 11.1562 15.75 10.8624 15.75 10.5C15.75 10.1778 15.5178 9.90989 15.2117 9.85432L15.0938 9.84375H11.1562V5.90625C11.1562 5.54382 10.8624 5.25 10.5 5.25Z"
                            fill="white" />
                    </svg>
                    Lưu
                </button>
            </div>
        </div>
        <div class="container">
            <div class="left">
                {{-- {{ dd($category->name) }} --}}
                <input type="hidden" name="id" value="{{ $category->id }}">
                <label for="product-name">Tên danh mục</label>
                <input @error('name')
                class="form-error"
                @enderror type="text"
                    id="product-name" name="name" value="{{ old('name') ? old('name') : $category->name }}"
                    style="grid-row: 2 / 3;">
                @error('name')
                    <div class="help-block has-error">{{ $message }}</div>
                @enderror
                <label for="product-name">Chọn cấp cha</label>
                <select style="grid-row: 2 / 3;" name="parent_id">
                    <option value="">Chọn cấp cha</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? ' selected ' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" id="product-name" style="grid-row: 2 / 3;" name="parent_id"> --}}
                <label for="product-name">Chọn trạng thái</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
                        Hiện
                    </label>
                    <label>
                        <input type="radio" name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }}>
                        Ẩn
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection
