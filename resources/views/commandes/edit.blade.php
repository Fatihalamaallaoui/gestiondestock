@extends('adminlte::page')

@section('title', 'update Commande')

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
                    <h3>
                    <B style="color:  #FFD700">
                        update Commande
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('commandes.update',$commandes->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id',$commandes->id)}}" placeholder="id" class="form-control">
                        </div>
                     
                       
                        <div class="form-group mb-3">
                            <label for="statut" class="form-label fw-bold">Statut</label>
                                                  
                            <select name="statut" size="1" class="form-control">
                                
                                <option value="En cours de traitement">En cours de traitement</option>
                                <option value="Pas encors traitée">Pas encors traitée </option>
                                <option value="Livrée">Livrée </option>

                               
                            
                            </select>
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

