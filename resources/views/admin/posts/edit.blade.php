@extends('admin/layouts.app')

@section('title', 'Update Post')

@section('content')
<div class="row align-items-center my-4">
    <div class="col">
        <h2 class="h3 mb-0 page-title">Update Post</h2>
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

<form method="POST"
        action="{{ route('admin.posts.update', ['id' => $carPost['id']]) }}"
        enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <hr class="my-4">
    {{--  <h5 class="mb-2 mt-4">Personal</h5>
    <p class="mb-4">Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus</p>  --}}
    @include('admin.posts.partials.form')
    <div class="form-row">
        {{--  <div class="col-md-6">
            <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customPass" checked>
            <label class="custom-control-label" for="customPass">Create account and email generated password</label>
            </div>
        </div>  --}}
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection