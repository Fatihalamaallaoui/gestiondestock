@extends('adminlte::page')

@section('title', 'Produits Management System | '.$produit->id)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                      <B style="color: #FF8C00">Produit : {{$produit->Designations}}</B> 
                    </h3>
                </div>
                <div class="card-body">
                   
                    <hr>
                    <div class="form-group mb-3">
                        <label for="Prix" class="form-label fw-bold">Prix </label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->prix}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Designations" class="form-label fw-bold">Désignations</label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->Designations}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label fw-bold">Image</label><br>
                        <img src="{{asset('tsawr/'.$produit->image)}}" width="150" height="150" alt="image_du_produit" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label fw-bold">Déscription</label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->description}}
                        </div>
                           <div class="form-group mb-3">
                        <label for="qauntite_minimale" class="form-label fw-bold">Qauntité minimale</label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->qauntite_minimale}}
                        </div>
                    
                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label fw-bold">catégorie</label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->category_id}}
                        </div>
                         <div class="form-group mb-3">
                        <label for="entrepot_id" class="form-label fw-bold">Entrepôt</label>
                        <div class="border border-secondary rounded p-2">
                            {{$produit->entrepot_id}}
                        </div>
                    </div>
                   </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



