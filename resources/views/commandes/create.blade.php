@extends('adminlte::page')

@section('title', 'Commandes Management System | Create')

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
        <div class="col-md-20"
            <div class="row my-10">
                <div class="col-md-10 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card my-7">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Ajouter une nouvelle Commande
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{route('commandes.store')}}" enctype="multipart/form-data">
                        @csrf
                      
                             <div class="form-group mb-3">
                            <label for="entrepots_recepteur" class="form-label fw-bold">Entrepôt recepteur</label><br>
                           
                        <select name="entrepots_recepteur" size="1" class="form-control">
                                @foreach($entrepots as $row)
                                <option value="{{$row->ville}}">{{$row->ville}}</option>
                                @endforeach
                            
                        </select>
                         </div>
            <div class="card bg-dark form-group mb-3">
                <div class="card-header">
                    Choisir Plusieurs Produits 
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                      
                    <label for="produit_id" class="form-label fw-bold">Le nom du produit</label><br>
                           
                    <select name="produit_id" id="product_name" size="1" class="form-control">
                      
                            @foreach($produits as $row)

                            <option value="{{$row->Designations}}">{{$row->Designations}} | {{$row->prix}} DH</option>
                            @endforeach
                        
                    </select>
                </div>
                    <div class="form-group mb-3">
                        <label for="quantite" class="form-label fw-bold">quantité</label><br>
                       
                    <select name="quantite" id="qty_cmd" size="1" class="form-control">
                            
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                           
                        
                    </select>

                    </div>

                    <div id="alerts"></div>

                    <div class="text-right mx-3 my-4">
                        <a onClick="addToCart()" class="btn btn-primary" >Ajouter</a>
                    </div>
                   
                    <span class="my-3" id="itemsquantity"> La Somme De quantité de commande:  0</span>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Désignations</th>
                              
                                <th>Qantité commandé</th>
                                <th>Image</th>
                                <th>Actions</th>
                               
                            </tr>
                        </thead>
                        
                         <tbody id="bodyajax">

                            {{-- @foreach ($produits as $key => $produit)
                                <tr id="carttable"> 
                                    
                                    <td>{{$produit->id}}</td>
                                    <td>{{$produit->Designations}}</td>
                                    <td>{{$produit->prix}}</td>
                                   <td>
                                    0
                                   </td>
                                    <td style="width:20%;">
                                        <img src="{{ asset('/tsawr/'.$produit->image) }}" style="width:50%;height:20%;" />
                                    </td>
                                     <td>
                                        <a href="{{route('produits.edit',$produit->id)}}"
                                            class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                     </td>
                                       
                                 </tr>
                            @endforeach --}}
                        </tbody>
                        </table>
                </div>
            </div>

          
                          

         

                            <div class="form-group mb-3">
                                
                            <label for="quantite" class="form-label fw-bold">quantité</label><br>
                           
                        <select name="quantite" size="1" class="form-control">
                                
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                               
                            
                        </select>

                        </div>
                      
                            
                             <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Demmander') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>

function addToCart()
{
                var getproductquantity = document.getElementById('qty_cmd').value;
               var getproductName = document.getElementById('product_name').value;
               var cart = [];
                 var stringCart;
                 var product =   {
                    productname : getproductName,
                    quantity : getproductquantity
                };

                var stringProduct = JSON.stringify(product);

                console.log(stringProduct);


}

    //         function addToCart()
    //         {
    //             var getproductquantity = document.getElementById('qty_cmd').value;
    //            var getproductName = document.getElementById('product_name').value;
    //            var cart = [];
    //              var stringCart;
    //              var product =   {
    //                 productname : getproductName,
    //                 quantity : getproductquantity
    //             };

             

    //           var stringProduct = JSON.stringify(product);


    //           console.log(stringProduct);

    //           if(!sessionStorage.getItem('cart')){
    //     //append product JSON object to cart array
    //     cart.push(stringProduct);
    //     //cart to JSON
    //     stringCart = JSON.stringify(cart);
    //     //create session storage cart item
    //     sessionStorage.setItem('cart', stringCart);
    //     addedToCart();
    //     updateCartTotal();
    // }
    // else {
    //     //get existing cart data from storage and convert back into array
    //    cart = JSON.parse(sessionStorage.getItem('cart'));
    //     //append new product JSON object
    //     cart.push(stringProduct);
    //     //cart back to JSON
    //     stringCart = JSON.stringify(cart);
    //     //overwrite cart data in sessionstorage 
    //     sessionStorage.setItem('cart', stringCart);
    //     addedToCart();
    //     updateCartTotal();
    // }

    //         }

/* Calculate Cart Total */

//user feedback on successful add
// function addedToCart(pname) {
//   var message = pname + " was added to the cart";
//   var alerts = document.getElementById("alerts");
//   alerts.innerHTML = message;
//   if(!alerts.classList.contains("message")){
//      alerts.classList.add("message");
//   }
// }
/* User Manually empty cart */
// function emptyCart() {
//     //remove cart session storage object & refresh cart totals
//     if(sessionStorage.getItem('cart')){
//         sessionStorage.removeItem('cart');
//         updateCartTotal();
//       //clear message and remove class style
//       var alerts = document.getElementById("alerts");
//       alerts.innerHTML = "";
//       if(alerts.classList.contains("message")){
//           alerts.classList.remove("message");
//       }
//     }
// }
//         </script>
    </div>
</div>
@endsection

