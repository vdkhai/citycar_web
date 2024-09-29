@extends('admin/layouts.app')

@section('title', 'Post List')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Car Posts</h2>
    </div>
    <div class="col-auto">
        {{-- <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
        <a href="{{ route('admin.posts.create') }}#">
            <button type="button" class="btn btn-primary">
                <span class="fe fe-filter fe-12 mr-2"></span>Create
            </button>
        </a>
    </div>
</div>

<!-- table -->
<style>
    .table {
        display: block;
        overflow-x: auto;
    }
    .table thead th {
        font-weight: bold;
    }
</style>

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
                <th>Action</th>
                <th>Thumbnail</th>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Transmission</th>
                <th>Body Type</th>
                <th>Fuel Type</th>
                <th>Current Color</th>
                <th>Seat</th>
                <th>State</th>
                <th>Registration Date</th>
                <th>Registration Type</th>
                <th>Current Mileage</th>
                <th>Spare Key</th>
                <th>Service Book</th>
                <th>Principal Warranty</th>
                <th>Principal Warranty Exp Date</th>
                <th>Owner Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carPosts as $carPost)
                <tr>
                    {{--  <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2474">
                            <label class="custom-control-label" for="2474"></label>
                        </div>
                    </td>  --}}
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.posts.edit', ['id' => $carPost['id']]) }}">Edit</a>
                            {{--  <a class="dropdown-item" href="{{ route('admin.posts.delete', ['id' => $carPost['id']]) }}">Delete</a>  --}}
                            <form action="{{ route('admin.posts.destroy', ['id' => $carPost['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Delete</button>               
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="avatar avatar-sm">
                            <img src="{{ optional($carPost['images'][0] ?? null)->url() }}" alt="" class="avatar-img" style="width: 100px;">
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['identify'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['title'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ number_format($carPost['price'], 0, '', '.') . ' ' . $carPost['currency'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['carModel']['carBrand']['name'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['carModel']['title'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarTransmission::getDescription($carPost['transmission']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarBodyType::getDescription($carPost['body_type']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarFuelType::getDescription($carPost['fuel_type']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarColor::getDescription($carPost['current_color']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarSeat::getDescription($carPost['seat']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\State::getDescription($carPost['state']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['registration_date'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\CarRegistrationType::getDescription($carPost['registration_type']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['current_mileage'] ? number_format($carPost['current_mileage'], 0, '', '.') : 0 }} {{ Config::get('constants.DEFAULT_DISTANCE_UNIT') }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\YesNo::getDescription($carPost['spare_key']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\YesNo::getDescription($carPost['service_book']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\YesNo::getDescription($carPost['principal_warranty']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $carPost['principal_warranty_exp_date'] }}</p>
                    </td>
                    <td class="text-muted">{{ $carPost['user']['email'] }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.posts.edit', ['id' => $carPost['id']]) }}">Edit</a>
                            {{--  <a class="dropdown-item" href="{{ route('admin.posts.delete', ['id' => $carPost['id']]) }}">Delete</a>  --}}
                            <form action="{{ route('admin.posts.destroy', ['id' => $carPost['id']])}}" method="POST">
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
