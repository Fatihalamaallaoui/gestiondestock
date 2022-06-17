@extends('adminlte::page')

@section('title', 'Produits Management System | Create')

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
        <div class="col-md-10"
            <div class="row my-5">
                <div class="col-md-15 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card my-10">
                <div class="card-header bg-white text-center p-3" >
                    <h3 class="text-center text-uppercase" style="color: #FF8C00">
                        <B>
                            Ajouter un nouveau Produit 
                        </B>
                        
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-6" action="{{route('produits.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id')}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="prix" class="form-label fw-bold">Prix</label>
                            <input type="text" name="prix" value="{{old('prix')}}" placeholder="prix" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Designations" class="form-label fw-bold">Désignations</label>
                            <input type="text" name="Designations" value="{{old('Designations')}}" placeholder="Designations" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="text" name="image" value="{{old('image')}}" placeholder="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-bold">Déscription</label>
                            <input type="text" name="description" value="{{old('description')}}" placeholder="description" class="form-control">
                        </div>
                         <div class="form-group mb-3">
                        <label for="
                        qauntite_minimale" class="form-label fw-bold">
                        Qauntité minimale</label>
                        <input type="text" name="qauntite_minimale" value="{{old('qauntite_minimale')}}" placeholder="qauntite_minimale" class="form-control">
                        </div>
                         <div class="form-group mb-3">
                        <label for="
                        quantity" class="form-label fw-bold">
                        Qauntité</label>
                        <input type="text" name="quantity" value="{{old('quantity')}}" placeholder="quantity" class="form-control">
                        </div>
                         <div class="form-group mb-3">
                            <label for="category_id" class="form-label fw-bold">Catégorie</label><br>
                           
                        <select name="category_id" size="1" class="form-control">
                                @foreach($categories as $row)
                                <option value="{{$row->nom}}">{{$row->nom}}</option>
                                @endforeach
                            
                        </select>

                        </div>
                            <div class="form-group mb-3">
                            <label for="entrepot_id" class="form-label fw-bold">Entrepôt</label><br>
                           
                            <select name="entrepot_id" size="1" class="form-control">
                                @foreach($entrepots as $row)
                                <option value="{{$row->ville}}">{{$row->ville}}</option>
                                @endforeach
                            
    </select>


                        </div>
                      
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

