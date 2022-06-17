<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Entrepot;
use App\Models\Produit;
use App\Models\produits_commandes;
use DB;
use Illuminate\Http\Request;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      

        $commandes = Commande::all();
        
        return view('commandes.index')->with([
            'commandes' => $commandes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $entrepots = Entrepot::all();
         $produits= Produit::all();
         return view('commandes.create')->with([
         'entrepots' => $entrepots,
         'produits'=>  $produits

          ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $validated = $this->validate($request, [
            
            'entrepots_recepteur' => 'required',
           
        ]);
      
         $myarraylist = $request->myarraylist;

      
        Commande::create([
            'entrepots_recepteur'=>$validated['entrepots_recepteur'],
            'statut'=>'pas encore traite',
            
        ]);

      
       

        foreach($myarraylist as $products )
        {
          
           foreach(json_decode($products) as $item)
           {
            $commande  = Commande::latest()->first();
            $myroduct = Produit::where('Designations',$item->productname)->first();
             
                $myarray = [
                    'produit_id'=>$myroduct->id,
                    'commande_id'=>$commande->id,
                    'quantity'=>$myroduct->quantity
                ];
         
                produits_commandes::create($myarray);
           }
        }
      


      
      
      
        return redirect()->route("commandes.index")->with([
            "success" => "Commande added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             $commandes= Commande::where('id', $id)->first();
        return view("commandes.show")->with([
            "commandes" => $commandes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $commandes = Commande::where('id', $id)->first();
        return view("commandes.edit")->with([
            "commandes" => $commandes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commandes = Commande::where('id', $id)->first();
        
        $request->validate([
           'id' => 'required',
            'statut' => 'required',
            
            
             ]);
          $data = $request->except(['_token', '_method']);
          Commande::whereId($id)->update($data);
            return redirect()->route("commandes.index")->with([
            "success" => "Commande updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commandes = Commande::all();
         
        $commandes = Commande::where('id', $id)->first();
        $produits_commandes = produits_commandes::where('commande_id', $id);
        $commandes->delete();
        $produits_commandes->delete();
        $commandes = Commande::all();
        return view('commandes.index')->with([
            'commandes' => $commandes ,
            'message'=> 'Successfully deleted!!'
        ]);
    }

    public function printpdf($idcmd)
    {
        $commande = Commande::where('id', $idcmd)->first();
        $produitscommander =DB::table('produits_commandes')->where('commande_id',$idcmd)->get('produit_id');
       $myarray = array();
        foreach($produitscommander as $item)
        {
            array_push($myarray,$item->produit_id);
            
        }
        $produits = Produit::whereIn('id',$myarray)->get();

        $sommeqtyproduit = Produit::where('entrepot_id',$idcmd)->sum('quantity');

        return view('print.index',compact('commande','produits','sommeqtyproduit'));

    }




}
