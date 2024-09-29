<style>
    ul.pagination li {
        margin: 0 3px;
    }
    ul.pagination li .page-link {
        border-radius: 4px; 
    }
    ul.pagination li span {
        padding: 0px 5px 0px 5px;
        cursor: default;
        text-align: center;
        line-height: 25px;
        /* color: #428bca; */
    }
</style>

<nav aria-label="Table Paging" class="my-3">
    <ul id="citicar-pagination" class="pagination justify-content-center"></ul>
</nav>

{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
<script src="{{ mix('pagination/js/pagination.js') }}"></script>
<script type="text/javascript">
    $('#citicar-pagination').pagination({
        total: {{ $total }}, // 总数据条数
        current: {{ $page }}, // 当前页码
        length: {{ $page_size }}, // 每页数据量
        size: 2, // 显示按钮个数
        prev: '<',
        next: '>',
        /**
         * [click description]
         * @param  {[object]} options = {
         *      current: options.current,
         *      length: options.length,
         *      total: options.total
         *  }
         * @param  {[object]} $target [description]
         * @return {[type]}         [description]
         */
        click: function(options, $target) { // 点击按钮事件
            console.log(options);
            // $('#idPaginationForm').attr('action', $('input[name="base_url"]').val());
            $('#idPaginationForm input[name="page"]').val(options.current);
            $('#idPaginationForm').submit();
        }
    });
</script>

<form id="idPaginationForm" action="{{ Request::fullUrl() }}" method="GET">
    <input type="hidden" name="page" value="" />

    @if (Request::has('keywords'))
        <input type="hidden" name="keywords" value="{{ Request::get('keywords') }}" />
    @endif

    @csrf
</form>