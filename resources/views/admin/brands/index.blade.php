@extends('admin/layouts.app')

@section('title', 'Brand List')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Car Brands</h2>
    </div>
    <div class="col-auto">
        {{-- <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
        <a href="{{ route('admin.brands.create') }}">
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
                <th>Logo</th>
                <th>Name</th>
                <th>Number of models</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carBrands as $carBrand)
                <tr>
                    {{--  <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2474">
                            <label class="custom-control-label" for="2474"></label>
                        </div>
                    </td>  --}}
                    <td>
                        <div class="avatar avatar-sm">
                            <img src="{{ optional($carBrand['image'] ?? null)->url() }}" alt="" class="avatar-img rounded-circle">
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carBrand['name'] }}</p>
                    </td>
                    <td class="text-muted">{{ $carBrand['car_models_count'] }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.brands.edit', ['id' => $carBrand['id']]) }}">Edit</a>
                            {{--  <a class="dropdown-item" href="{{ route('admin.posts.delete', ['id' => $carPost['id']]) }}">Delete</a>  --}}
                            <form action="{{ route('admin.brands.destroy', ['id' => $carBrand['id']])}}" method="POST">
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
