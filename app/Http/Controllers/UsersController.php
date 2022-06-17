<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Entrepot;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with([
            'users' => $users
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
        return view('users.create')->with([
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
          $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'entrepot_id' => 'required',

            'password' => 'required',
            'role_as' => 'required',


            
        ]);
        $data = $request->except(['_token']);
        User::create($data);
        return redirect()->route("users.index")->with([
            "success" => "User added successfully"
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
        
         $users= User::where('id', $id)->first();
        return view("users.show")->with([
            "users" => $users
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
        $entrepots = Entrepot::all();
          $users = User::where('id', $id)->first();
        return view("users.edit")->with([
            "users" => $users,
            'entrepots' => $entrepots
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
             $users = User::where('id', $id)->first();
        
        $request->validate([
           'id' => 'required',
            'name' => 'required',
            'email' => 'required',
             'entrepot_id' => 'required',

            'password' => 'required',
            'role_as' => 'required',
            
             ]);
        
          $data = $request->except(['_token', '_method']);
          User::whereId($id)->update($data);
            return redirect()->route("users.index")->with([

         
         
            "success" => "User updated successfully"
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
        $users = User::all();
         
        $users = User::where('id', $id)->first();
        $users->delete();
        $users = User::all();
        return view('users.index')->with([
            'users' => $users ,
            'message'=> 'Successfully deleted!!'
        ]);
    }
}
