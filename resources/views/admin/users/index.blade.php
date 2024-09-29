@extends('admin/layouts.app')

@section('title', 'User List')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Users</h2>
    </div>
    <div class="col-auto">
        {{-- <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
        {{--  <a href="{{ route('admin.users.create') }}#">
            <button type="button" class="btn btn-primary">
                <span class="fe fe-filter fe-12 mr-2"></span>Create
            </button>
        </a>  --}}
    </div>
</div>

<!-- table -->
{{--  <style>
    .table {
        display: block;
        overflow-x: auto;
    }
    .table thead th {
        font-weight: bold;
    }
</style>  --}}

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
                <th>Name</th>
                <th>Email</th>
                <th>Number of posts</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    {{--  <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2474">
                            <label class="custom-control-label" for="2474"></label>
                        </div>
                    </td>  --}}
                    <td>
                        <p class="mb-0 text-muted">{{ $user['name'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $user['email'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $user['car_posts_count'] }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ \App\Enums\UserType::getDescription($user['is_admin']) }}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted">{{ $user['created_at'] }}</p>
                    </td>
                    <td class="text-muted">{{ $user['updated_at'] }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        @if (!$user['is_admin'])
                            <div class="dropdown-menu dropdown-menu-right">
                                {{--  <a class="dropdown-item" href="{{ route('admin.posts.edit', ['id' => $carPost['id']]) }}">Edit</a>  --}}
                                {{--  <a class="dropdown-item" href="{{ route('admin.posts.delete', ['id' => $carPost['id']]) }}">Delete</a>  --}}
                                <form action="{{ route('admin.users.destroy', ['id' => $user['id']])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit">Delete</button>               
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@include('admin/layouts.pagination')
@endsection
