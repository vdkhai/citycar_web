@extends('admin/layouts.app')

@section('title', 'Model List')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Car Models</h2>
    </div>
    <div class="col-auto">
        {{-- <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
        <a href="{{ route('admin.models.create') }}">
            <button type="button" class="btn btn-primary">
                <span class="fe fe-filter fe-12 mr-2"></span>Create
            </button>
        </a>
    </div>
</div>

<!-- table -->
<div class="card shadow posts">
    <div class="card-body">
      <table class="table table-borderless table-hover">
        <thead>
            <tr>
                {{--  <th>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="all2">
                        <label class="custom-control-label" for="all2"></label>
                    </div>
                </th>  --}}
                <th>Title</th>
                <th>Brand</th>
                <th>Number of posts</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carModels as $carModel)
                <tr>
                    {{--  <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2474">
                            <label class="custom-control-label" for="2474"></label>
                        </div>
                    </td>  --}}
                    <td>
                        <p class="mb-0 text-muted">{{ $carModel['title'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carModel['carBrand']['name'] }}</p>
                    </td>
                    <td class="text-muted">{{ $carModel['car_posts_count'] }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.models.edit', ['id' => $carModel['id']]) }}">Edit</a>
                            {{--  <a class="dropdown-item" href="{{ route('admin.posts.delete', ['id' => $carPost['id']]) }}">Delete</a>  --}}
                            <form action="{{ route('admin.models.destroy', ['id' => $carModel['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Delete</button>               
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@include('admin/layouts.pagination')
@endsection
