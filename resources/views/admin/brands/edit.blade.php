@extends('admin/layouts.app')

@section('title', 'Update Brand')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Update Brand</h2>
    </div>
    {{-- <div class="col-auto">
        <button type="button" class="btn btn-primary">Save Change</button>
    </div> --}}
</div>

<style>
    .invalid-feedback {
        display: block;
    }
</style>

<form action="{{ route('admin.brands.update', ['id' => $carBrand['id']]) }}"
        method="POST"
        enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <hr class="my-4">
    {{--  <h5 class="mb-2 mt-4">Personal</h5>
    <p class="mb-4">Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus</p>  --}}
    @include('admin.brands.partials.form')
    <div class="form-row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection