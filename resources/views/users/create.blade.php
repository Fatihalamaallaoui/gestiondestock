@extends('adminlte::page')

@section('title', 'users Management System | Create')

@section('content')
<style type="text/css">
.row.justify-content-center {
    display: -ms-flexbox;
    display: flow-root;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
}
</style>
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
                   <h3 class="text-center text-uppercase" style="color: #FF8C00">
                        <B>
                        Ajouter un nouveau Technicien
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id')}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Nom</label>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" name="email" value="{{old('email')}}" placeholder="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" value="{{old('password')}}" placeholder="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="role_as" class="form-label fw-bold">Le role</label>
                            <input type="text" name="role_as" value="{{old('role_as')}}" placeholder="role_as" class="form-control">
                        </div>
                                                  <div class="form-group mb-3">
                            <label for="entrepot_id" class="form-label fw-bold">Entrepôt</label><br>
                           
                            <select name="entrepot_id" size="1" class="form-control">
                                @foreach($entrepots as $row)
                                <option value="{{$row->ville}}">{{$row->ville}}</option>
                                @endforeach
                            
    </select>

                             <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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

