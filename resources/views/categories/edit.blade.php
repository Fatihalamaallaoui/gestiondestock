@extends('adminlte::page')

@section('title', 'update categories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20"
            <div class="row my-10">
                <div class="col-md-10 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card my-7">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        <B style="color:  #FFD700">
                        Update categories
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('categories.update',$categories->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id',$categories->id)}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label fw-bold">Nom</label>
                            <input type="text" name="nom" value="{{old('nom',$categories->nom)}}" placeholder="nom" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <input type="text" name="description" value="{{old('description',$categories->description)}}" placeholder="description" class="form-control">
                        </div>
                                <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

