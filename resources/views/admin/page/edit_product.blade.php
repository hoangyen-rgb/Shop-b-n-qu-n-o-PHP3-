@extends('layout.layoutadmin')
@section('titleadmin', 'Sửa sản phẩm')
@section('contentadmin')
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
            /* width: 100%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    display: grid; */
        }

        .container .left {
            /* display: grid;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           grid-template-rows: 30px 40px 30px auto 30px 40px; */
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--gray);
            padding: 10px;
            align-items: center;
        }

        .container .left label {
            font-size: 18px;
            margin-left: 10px;
            font-weight: bold;
        }

        .container .left :is(input, select, textarea) {
            margin: 0px 10px;
            height: 100%;
            /* resize: none; */
            border-radius: 5px;
            /* outline: none !important; */
            border: 1px solid var(--gray);
            padding: 10px;
        }

        .pd-2 {
            padding: 2% 0;
        }

        /* public/css/your-style.css */
        .image-preview-item {
            width: 90px;
            height: 100px;
            margin: 5px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .grid-item {
            display: flex;
            flex-direction: column;
        }

        .form-check.form-check-inline {
            display: flex !important;
            align-items: center !important;
        }

        .form-check .form-check-label {
            margin-left: 0.5rem;
            /* Điều chỉnh khoảng cách giữa checkbox và label */
        }
    </style>
    <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
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
                <div class="pd-2">
                    <label for="">Tên sản phẩm:</label>
                    <input type="" name="name" value="{{ $product->name }}">
                    <label for="">Chọn danh mục:</label>
                    <select name="parent_id" id="">
                        <?php $category = new \App\Models\categories(); ?>
                        {!! $category->categoryParent($categories, $product->category_id) !!}
                    </select>
                    <label for="">Slug:</label>
                    <input type="text" min="0" name="slug" value="{{ $product->slug }}">
                    <label for="">Thương hiệu:</label>
                    <select name="brand" id="">
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $product->brand_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="pd-2">
                        <label for="">Giá sản phẩm:</label>
                        <input type="" name="price" value="{{ $product->price }}">
                        <label for="">Giá giảm:</label>
                        <input type="" name="price_sale" value="{{ $product->price_sale }}">
                        {{-- @dd($product->type) --}}
                        <select name="type" id="">
                            <option value="{{ $product->type }}" {{ $product->type == 'ao' ? 'selected' : '' }}>Áo</option>
                            <option value="{{ $product->type }}" {{ $product->type == 'quan' ? 'selected' : '' }}>Quần
                            </option>
                        </select>

                    </div>
                    <div class="grid-container">
                        <div class="grid-item">
                            <label>Màu sắc:</label>
                            {{-- @dd($productColors); --}}
                            @foreach ($colors as $color)
                                <div class="form-check form-check-inline d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="color_{{ $color->id }}"
                                        name="colors[]" value="{{ $color->id }}"
                                        {{ $productColors->contains('color_id', $color->id) ? 'checked' : '' }}>
                                    <span class="form-check-label"
                                        for="color_{{ $color->id }}">{{ $color->name }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="grid-item">
                            @if ($product->type == 'ao')
                                <label>Kích thước áo:</label>
                                @foreach ($clothing_sizes as $size)
                                    <div class="form-check form-check-inline d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="size_{{ $size->id }}"
                                            name="clothing_sizes[]" value="{{ $size->id }}"
                                            {{ $productClothingSizes->contains('clothing_size_id', $size->id) ? 'checked' : '' }}>
                                        <span class="form-check-label"
                                            for="size_{{ $size->id }}">{{ $size->name }}</span>
                                    </div>
                                @endforeach
                            @elseif ($product->type == 'quan')
                                <label>Kích thước quần:</label>
                                @foreach ($pant_sizes as $pant_size)
                                    <div class="form-check form-check-inline d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="pant_size_{{ $pant_size->id }}"
                                            name="pant_sizes[]" value="{{ $pant_size->id }}"
                                            {{ $productPantSizes->contains('pant_size_id', $pant_size->id) ? 'checked' : '' }}>

                                        <span class="form-check-label" for="pant_size_{{ $pant_size->id }}">
                                            {{ $pant_size->name }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="grid-item">
                            <label>Mô tả sản phẩm:</label>
                            <textarea rows="10" cols="70" name="description">
                                {{ $product->description }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="pd-2">
                    <label for="image-input">Ảnh mô tả:</label> <br>
                    @foreach ($product->images as $image)
                        <img src="{{ asset('site/img/gallery/' . $image->image) }}" id="image-preview" width="100px"
                            height="100px" alt="">
                    @endforeach

                    <input type="file" name="images[]" onchange="previewImages()" id="image-input" multiple
                        accept="image/*" style="border: none">
                    <div id="new-image-preview" class="image-preview-container"></div>
                </div>
            </div>
        </div>
    </form>
@endsection
<script>
    function previewImages() {
        var input = document.getElementById('image-input');
        var previewContainer = document.getElementById('new-image-preview');
        previewContainer.innerHTML = '';

        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.width = 100;
                img.height = 100;
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
</script>
