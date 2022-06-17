@extends('adminlte::page')

@section('title', 'Print Command Page')

@section('content_header')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
        </div>
            <div id="printdiv" class="card  my-3">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                      Détails sur la Commande
                    </h3>
                </div>

          
                  <div class="card-body">
                    <div class="small-header my-2 mb-3">
                        <h4 class=" text-captilize">
                            <b>
                                Les informations  De La Commande
                                
                            </b>
                           
                        </h4>
                    </div>
                   <div class="info_box" style="display: flex;flex-direction:row;justify-content:space-between;">
                    <div class="col-5 my-2" style="display:flex;flex-direction:column;">
                        <span><b> Statut : </b></span>
                       
                        <span>{{$commande->statut}} </span>
                    
                    </div>
                       <div class="col-5" style="display:flex;flex-direction:column;">
                        <span> <b>L'Entrepots Recepteur </b> </span>
                        <span>{{$commande->entrepots_recepteur}} </span>
                         <span><b>Etat</b></span>
                        <span>{{$commande->etat}}  </span>
                        <span style="color: RED"> <b> La Somme De quantité commandé<b>
                            {{$sommeqtyproduit}}
                        </span>
                       
                       </div>
                       
                   </div>
               
                   <div class="prouitescommand_box">
                    <div class="card  my-3">
                        <div class="card-header">
                            <h3 class=" text-captilize">
                                <b>
                                    Les Produits De La Commande :
                                </b>
                               
                            </h3>
                            
                        </div>
        

                          <div class="card-body">
                             
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>prix</th>
                                        <th>Designations</th>
                                        <th>image</th>
                                      
                                    </tr>
                                </thead>
                                 <tbody id="bodyajax">
                                    @foreach ($produits as $key => $produit)
                                        <tr>
                                            
                                            <td>{{$produit->id}}</td>
                                            <td>{{$produit->prix}}</td>
                                            <td>{{$produit->Designations}}</td>
                                            <td style="width:20%;">
                                                <img src="{{ asset('/tsawr/'.$produit->image) }}" style="width:50%;height:20%;" />
                                            </td>
                                             
                                               
                                         </tr>
                                    @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                   </div>
                </div>
            </div>

            <div class="btnprint_box py-2 px-3 bg-white mx-2 text-right">
                <a onClick="printme()" class="btn btn-warning " > Print </a>
            </div>
         </div>
    </div>

    <script>
        function printme()
        {
            var printcontent =  document.getElementById('printdiv').innerHTML;
            var originalcontent = document.body.innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = originalcontent;
            location.reload();
        }
    </script>

  

@endsection
