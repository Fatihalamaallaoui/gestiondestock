@extends('adminlte::page')

@section('title', 'update users')

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
                        update Technicien
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('users.update',$users->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id',$users->id)}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" value="{{old('name',$users->name)}}" placeholder="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" name="email" value="{{old('email',$users->email)}}" placeholder="email" class="form-control">
                        </div>
                          <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" value="{{old('password',$users->password)}}" placeholder="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="role_as" class="form-label fw-bold">Le role</label>
                            <input type="text" name="role_as" value="{{old('role_as')}}" placeholder="role_as" class="form-control">
                        </div>
                            <div class="form-group mb-3">
                            <label for="entrepots_id" class="form-label fw-bold">Entrepôts</label><br>
                           
                            <select name="entrepot_id" size="1" class="form-control">
                                @foreach($entrepots as $row)
                                <option value="{{old('entrepot_id',$row->ville)}}">{{$row->ville}}</option>
                                @endforeach
                            
    </select>
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

