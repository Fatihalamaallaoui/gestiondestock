@extends('adminlte::page')

@section('title', 'update produit')

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
                        update Produit
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('produits.update',$produit->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id" class="form-label fw-bold">Id</label>
                            <input type="text" name="id" value="{{old('id',$produit->id)}}" placeholder="id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="prix" class="form-label fw-bold">Prix</label>
                            <input type="text" name="prix" value="{{old('prix',$produit->prix)}}" placeholder="prix" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Designations" class="form-label fw-bold">Désignations</label>
                            <input type="text" name="Designations" value="{{old('Designations',$produit->Designations)}}" placeholder="Designations" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="text" name="image" value="{{old('image',$produit->image)}}" placeholder="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label fw-bold">Déscription</label>
                            <input type="text" name="description" value="{{old('description',$produit->description)}}" placeholder="description" class="form-control">
                        </div>
                          <div class="form-group mb-3">
                            <label for="qauntite_minimale" class="form-label fw-bold">Qauntité minimale</label>
                            <input type="text" name="qauntite_minimale" value="{{old('qauntite_minimale',$produit->qauntite_minimale)}}" placeholder="qauntite_minimale" class="form-control">
                        </div>
                            <div class="form-group mb-3">
                            <label for="category_id" class="form-label fw-bold">Catégorie </label><br>
                           
                            <select name="category_id" size="1" class="form-control">
                                @foreach($categories as $row)
                                <option value="{{old('category_id',$row->nom)}}">{{$row->nom}}</option>
                                @endforeach
                            
    </select>
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

