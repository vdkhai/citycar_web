<style>
    .search {
        position: relative;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1)
    }

    .search input {
        height: 50px;
        text-indent: 25px;
        border: 1px solid #d6d4d4
    }

    .search input:focus {
        box-shadow: none;
        border: 1px solid #090066
    }

    .search .fa-search {
        position: absolute;
        top: 16px;
        left: 16px
    }

    .search button {
        position: absolute;
        top: 7px;
        right: 7px;
        height: 36px;
        color: white;
        background-color: #090066;
        font-weight: bold;
        font-size: large;
        display: inline-flex;
        align-items: center;
    }

    .page-item .page-link {
        border: 1px solid #d6d4d4;
    }
    .page-item.active .page-link {
        background-color: #090066;
        font-weight: bold;
    }
</style>

<div class="search">
    <i class="fa fa-search"></i>
    {{--  <input type="text" class="form-control" placeholder="Search for cars by Keywords">  --}}
    <form id="idSearchForm" action="{{ route('index') }}/search" method="GET">
        <input type="hidden" name="page" value="1" />
        <input type="text" name="keywords" value="{{ Request::get('keywords', '') }}" class="form-control" placeholder="Search for cars by Keywords">
        @csrf
        <button type="submit" class="btn btn-primary">Go</button>
    </form>
</div>