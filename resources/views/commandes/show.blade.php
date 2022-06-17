@extends('adminlte::page')

@section('title', 'Commandes Management System | '.$commandes->id)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                         <B style="color: #FF8C00">
                        Commande: {{$commandes->id}}
                    </B>
                    </h3>
                </div>
                <div class="card-body">
                   
                    <hr>
                    <div class="form-group mb-3">
                        <label for="id" class="form-label fw-bold">Id </label>
                        <div class="border border-secondary rounded p-2">
                            {{$commandes->id}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="entrepots_recepteur" class="form-label fw-bold">Entrepôts_recepteur</label>
                        <div class="border border-secondary rounded p-2">
                            {{$commandes->entrepots_recepteur}}
                        </div>
                    </div>
                   
                
                      <div class="form-group mb-3">
                        <label for="created_at" class="form-label fw-bold">Created_at</label>
                        <div class="border border-secondary rounded p-2">
                            {{$commandes->created_at}}
                        </div>
                    </div>
                      <div class="form-group mb-3">
                        <label for="statut" class="form-label fw-bold">Statut</label>
                        <div class="border border-secondary rounded p-2">
                            {{$commandes->statut}}
                        </div>
                    </div>
                   
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



