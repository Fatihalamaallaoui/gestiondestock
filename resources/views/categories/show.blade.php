@extends('adminlte::page')

@section('title', 'categories Management System | '.$categories->id)

@section('content')
<div class="row">
    <div class="col-md-12">
        <div  class="card  my-3">
            <div class="card-header">
                <h3 class="text-center text-uppercase">
                    <B style="color: #FF8C00">
                 Détails sur la catégorie :
             </B>
                </h3>
            </div>

      
              <div class="card-body">
                <div class="small-header my-2 mb-3">
                    <h4 class=" text-captilize">
                        <b>Les informations à propos cette Catégorie :</b>
                       
                    </h4>
                </div>
               <div class="info_box" style="display: flex;flex-direction:row;justify-content:space-between;">
                <div class="col-5 my-2" style="display:flex;flex-direction:column;">
                    <span><b>Nom Categorie : </b> </span>
                    
                    <span> {{$categories->nom}}</span>
                
                </div>
                   <div class="col-5" style="display:flex;flex-direction:column;">
                     <span> <b>Description : </b></span>

                    <span> {{$categories->description}}</span>
                  
                   </div>
                   
               </div>
           
               <div class="prouitescommand_box">
                <div class="card   my-3">
                    <div class="card-header">
                        <h3 class=" text-captilize">
                      <b> Les Produits De {{$categories->nom}}</b>    
                        </h3>
                    </div>
    
                    <div class="card-body row">
                        @if(count($produitcategorie) > 0)

                        @foreach($produitcategorie as $produit)

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
                            il n'y a aucun produit dans cette catégorie
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



