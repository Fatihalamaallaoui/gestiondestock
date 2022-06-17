@extends('adminlte::page')

@section('title', 'Users Management System | '.$users->id)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                   <h3 class="text-center text-uppercase" style="color: #FF8C00">
                        <B>
                        Technicien : {{$users->nom}}
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                   
                    <hr>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Id </label>
                        <div class="border border-secondary rounded p-2">
                            {{$users->id}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Nom</label>
                        <div class="border border-secondary rounded p-2">
                            {{$users->name}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Email</label>
                        <div class="border border-secondary rounded p-2">
                            {{$users->email}}
                        </div>
                    </div>
                     <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Password</label>
                        <div class="border border-secondary rounded p-2">
                            {{$users->password}}
                        </div>
                    </div>
                     <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">le role</label>
                        <div class="border border-secondary rounded p-2">
                            {{$users->role_as}}
                        </div>
                    </div>
                   
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



