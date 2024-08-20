<body>
    @extends('layout.layoutsite')
    @section('title', 'Trang Chủ')
    @section('content')
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="index.html">Trang chủ</a></li>
                                <li>/</li>
                                <li>Cửa hàng</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--shop  area start-->
        <div class="shop_area shop_reverse">
            <div class="container">
                <div class="shop_inner_area">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <!--sidebar widget start-->
                            <div class="sidebar_widget">
                                <div class="widget_list widget_filter">
                                    <h2>Lọc Theo Giá</h2>
                                    <form method="get" action="{{ route('shop.filter') }}">
                                        <div class="form-group">
                                            <label for="priceMin">Giá tối thiểu:</label>
                                            <input type="number" name='min_price' class="form-control" id="priceMin"
                                                placeholder="Nhập giá tối thiểu" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="priceMax">Giá tối đa:</label>
                                            <input type="number" name='max_price' class="form-control" id="priceMax"
                                                placeholder="Nhập giá tối đa" min="0">
                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="filterPrice()">Lọc</button>
                                    </form>
                                </div>
                                <div class="widget_list widget_categories">
                                    <h2>Danh Mục Sản Phẩm</h2>
                                    <ul>
                                        @foreach ($list_categories as $item)
                                            <li><a href="{{ route('shop.category', $item->id) }}">{{ $item->name }}
                                                    <span>{{ $product_counts[$item->id] }}</span></a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--sidebar widget end-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <!--shop wrapper start-->
                            <!--shop toolbar start-->
                            <div class="shop_title">
                                <h1>Sản phẩm</h1>->{{ $categoryName }}
                            </div>
                            <div class="shop_toolbar_wrapper">
                                <div class="shop_toolbar_btn">

                                    <button data-role="grid_3" type="button" class="active btn-grid-3"
                                        data-toggle="tooltip" title="3"></button>

                                    <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                        title="4"></button>

                                    <button data-role="grid_5" type="button" class="btn-grid-5" data-toggle="tooltip"
                                        title="5"></button>
                                </div>
                                <form action="{{ route('shop.sort') }}" method="GET">
                                    <select name="sort" class="form-control">
                                        <option value="">-- Lọc theo --</option>
                                        <option value="name-asc">Sắp xếp theo tên: A đến Z</option>
                                        <option value="name-desc">Sắp xếp theo tên: Z đến A</option>
                                        <option value="price-asc">Sắp xếp theo giá: thấp đến cao</option>
                                        <option value="price-desc">Sắp xếp theo giá: cao đến thấp</option>
                                    </select>
                                    <button type="submit">Sort</button>
                                </form>
                                <div class="page_amount">
                                    <p>Hiển thị 1–9 trên 21 kết quả</p>
                                </div>
                            </div>
                            <!--shop toolbar end-->

                            <div class="row shop_wrapper">
                                @foreach ($products as $item)
                                    <div class="col-lg-4 col-md-4 col-12 ">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ asset('site/img/product') }}/{{ $item->image }}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ asset('site/img/gallery') }}/{{ $item->images->skip(1)->first()->image }}"
                                                        alt=""></a>
                                                <div class="quick_button">
                                                    <a href="{{ route('detail', $item->id) }}" title="quick_view">Xem sản
                                                        phẩm</a>
                                                </div>
                                                @if ($item->price_sale > 0)
                                                    <div class="product_sale">
                                                        <?php $product = new \App\Models\Products(); ?>
                                                        <span>-{{ $product->percent($item->price_sale, $item->price) }}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product_content">
                                                <h3><a href="product-details.html">{{ $item->name }}</a></h3>
                                                <span
                                                    class="current_price">{{ number_format($item->price_sale, 0, '.', ',') }}
                                                    VNĐ</span>
                                                <span class="old_price">{{ number_format($item->price, 0, '.', ',') }}
                                                    VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $products->links($view) }}
                            {{-- <div class="shop_toolbar t_bottom">
                                <div class="pagination">
                                    <ul>

                                        <li class="current">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#">next</a></li>
                                        <li><a href="#">>></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!--shop toolbar end-->
                            <!--shop wrapper end-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--shop  area end-->
    @endsection
</body>
<script>
    function sortProducts() {
        var sortBy = document.getElementById('sort').value;

        fetch('{{ route('shop.sort') }}?sort=' + sortBy, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Cập nhật danh sách sản phẩm trong view
                updateProductList(data.products);
            })
            .catch(error => {
                console.error('Lỗi khi sắp xếp sản phẩm:', error);
            });
    }

    function filterPrice() {
        var minPrice = document.getElementById("priceMin").value;
        var maxPrice = document.getElementById("priceMax").value;

        // Kiểm tra xem người dùng có nhập giá trị âm không
        if (minPrice < 0 || maxPrice < 0) {
            alert("Giá trị nhập vào không được âm.");
            return;
        }

        // Lọc dữ liệu dựa trên giá trị từ form
        // Ví dụ: lọc một danh sách sản phẩm
        var products = document.getElementsByClassName("product");
        for (var i = 0; i < products.length; i++) {
            var price = parseFloat(products[i].getAttribute("data-price"));
            if (price >= minPrice && price <= maxPrice) {
                products[i].style.display = "block";
            } else {
                products[i].style.display = "none";
            }
        }
    }
</script>
