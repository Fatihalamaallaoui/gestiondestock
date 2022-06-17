@extends('adminlte::page')

@section('title', 'update entrepots')

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
                        Update Entrepôts
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('entrepots.update',$entrepots->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id',$entrepots->id)}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ville" class="form-label fw-bold">Ville</label>
                            <input type="text" name="ville" value="{{old('ville',$entrepots->ville)}}" placeholder="ville" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="adresse" class="form-label fw-bold">Adresse</label>
                            <input type="text" name="adresse" value="{{old('adresse',$entrepots->adresse)}}" placeholder="adresse" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label fw-bold">Phone</label>
                            <input type="text" name="phone" value="{{old('phone',$entrepots->phone)}}" placeholder="adresse" class="form-control">
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

