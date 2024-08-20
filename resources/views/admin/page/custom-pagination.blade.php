<style>
    .shop_toolbar {
        display: flex;
        justify-content: center;
        margin: 20px 0 20px 0;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        margin: 20px 0 20px 0;
    }

    .pagination {

        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination ul {
        display: flex;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .pagination li.active span {
        display: block;
        padding: 5px 10px;
        background-color: #fd7e14;
        color: #fff;
        border: 1px solid #fd7e14;
        border-radius: 3px;
    }

    .pagination li a:hover {
        background-color: #fd7e14;
        color: #fff;
        border-color: #fd7e14;
    }

    .pagination li.prev a,
    .pagination li.next a {
        font-size: 18px;
    }

    .pagination li.disabled a {
        color: #999;
        pointer-events: none;
        cursor: not-allowed;
    }

    .pagination li.disabled a:hover {
        background-color: #f5f5f5;
    }
</style>
<div class="pagination-container">
    <div class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><a href="">&laquo;</a></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span><a href="">&raquo;</a></span></li>
            @endif
        </ul>
    </div>
</div>
