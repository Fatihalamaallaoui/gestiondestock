<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Entrepot;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         $produits = Produit::all();
         $categories = Categorie::all();
    
        return view('produits.index')->with([
            'produits' => $produits,'categories'=>$categories
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $entrepots = Entrepot::all();
         return view('produits.create')->with([
         'categories' => $categories,
         'entrepots' => $entrepots
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
        //
        $this->validate($request, [
            'id' => 'required',
            'prix' => 'required|unique:produits',
            'Designations' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'entrepot_id' => 'required',
            'qauntite_minimale' => 'required',
            
        ]);
        $data = $request->except(['_token']);
        Produit::create($data);
        return redirect()->route("produits.index")->with([
            "success" => "Produit added successfully"
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
        $categories = Categorie::all();
        $entrepots = Entrepot::all();
        $produit= Produit::where('id', $id)->first();
        return view("produits.show")->with([
            "produit" => $produit,
            'categories' => $categories,
            'entrepots' => $entrepots
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
        $categories = Categorie::all();
         $entrepots = Entrepot::all();
        $produit = Produit::where('id', $id)->first();
        return view("produits.edit")->with([
            "produit" => $produit,
                     'categories' => $categories,
                     'entrepots' => $entrepots

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
        $produit = Produit::where('id', $id)->first();
        
        $request->validate([
            'id' => 'required|unique:produits,id,' . $produit->id,
            'prix' => 'required',
            'Designations' => 'required',
            'image'=>'required',
            'qauntite_minimale'=>'required'
             ]);
          $data = $request->except(['_token', '_method']);
          Produit::whereId($id)->update($data);
            
               return redirect()->route("produits.index")->with([
            "success" => "Produit updated successfully"
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
         $produits = Produit::all();
         $produit = Produit::where('id', $id)->first();
         $produit->delete();
         $produits = Produit::all();
        return view('produits.index')->with([
            'produits' => $produits,
            'message'=> 'Successfully deleted!!'
        ]);
    }



    public function getbycategory($idcat)
    {
        $categories = Categorie::all();
     
       $categorychoose = Categorie::find($idcat)->get();

       $produits = Produit::where('category_id',$idcat)->get();

      

      

       if($produits)
       {
        
      
        return view('produits.index',compact("produits","categories","categorychoose"));
    
    }
    }


}