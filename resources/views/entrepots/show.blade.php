@extends('adminlte::page')

@section('title', 'Entrepots Management System | '.$entrepots->id)

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div  class="card  my-3">
                <div class="card-header">
                    <h3 class="text-center text-uppercase" style="color: #FF8C00">
                        <b>
                      Détails sur l' entrepôt:
                  </b>
                    </h3>
                </div>
    
          
                  <div class="card-body">
                    <div class="small-header my-2 mb-3">
                        <h4 class=" text-captilize"><B>
                            Les informations  De L'Entrepôt
                        </B>
                           
                        </h4>
                    </div>
                   <div class="info_box" style="display: flex;flex-direction:row;justify-content:space-between;">
                    <div class="col-5 my-2" style="display:flex;flex-direction:column;">
                        <span><b> Ville :</b> </span>
                        <span>{{$entrepots->ville}} </span>
                    
                    </div>
                       <div class="col-5" style="display:flex;flex-direction:column;">
                        <span><b>Adresse </b></span>
                        <span>Adresse : {{$entrepots->adresse}} </span>
                        <span> <b>Phone </b> </span>
                        <span>Phone : {{$entrepots->phone}}  </span>
                      
                       
                       </div>
                       
                   </div>
               
                   <div class="prouitescommand_box">
                    <div class="card   my-3">
                        <div class="card-header " style="display: flex;justify-content:space-between;">
                            <h3 class=" text-captilize">
                                <b>
                                  Les Produits De   
                                </b>
                               {{$entrepots->ville}}
                            </h3>

                            <span style="color: RED"> <b>
                                Total de stok : 
                                {{$sommeqtyproduit}}
                            </b>
                            </span>
                        </div>
        
                        <div class="card-body row">
                        
                           @if(count($produitentrepot)>0)
                            @foreach($produitentrepot as $produit)
    
                            <div class="box_produit col-3 m-2">
                                <div class="preview_img">
                                    <img style="width: 80%;height:80%;" src="{{asset('/tsawr/'.$produit->image)}}" />
                                </div>
                               
    
                                <div class="small-info">
                                    <h4>{{$produit->prix}} DH</h4>
                                    <span>{{$produit->Designations}}</span>
                                </div>
                               
                                <p>
                                    {{$produit->description}}
                                </p>
                            </div>
    
    
                            @endforeach
                         @else
                        
                            <div class="text-center m-auto">
                                il n'y a aucun produit dans cet'entrepôt
                            </div>
    
                        @endif
                        </div>
            </div>
         </div>
    
                </div>
            </div>
        </div>
      

    </div>

@endsection



