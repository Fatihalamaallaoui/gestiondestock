<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
       
        return view('categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'id' => 'required',
            'nom' => 'required|unique:categories',
            
            
        ]);
        $data = $request->except(['_token']);
        Categorie::create($data);
        return redirect()->route("categories.index")->with([
            "success" => "Catégorie added successfully"
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
        
         $categories= Categorie::where('id', $id)->first();
         $produitcategorie = Produit::where('category_id',$id)->get();
        return view("categories.show")->with([
            "categories" => $categories,
            "produitcategorie"=>$produitcategorie
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
          $categories = Categorie::where('id', $id)->first();
        return view("categories.edit")->with([
            "categories" => $categories
        ]);
    }
 







    /**s
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $categories = Categorie::where('id', $id)->first();
        
        $request->validate([
            'id' => 'required|unique:categories,id,' . $categories->id,
            'nom' => 'required',
            'description' => 'required',
            
             ]);
          $data = $request->except(['_token', '_method']);
          Categorie::whereId($id)->update($data);
            return redirect()->route("categories.index")->with([
            "success" => "Categorie updated successfully"
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
        $categories = Categorie::all();
         
        $categories = Categorie::where('id', $id)->first();
        $categories->delete();
        $categories = Categorie::all();
        return view('categories.index')->with([
            'categories' => $categories ,
            'message'=> 'Successfully deleted!!'
        ]);
    }
}
