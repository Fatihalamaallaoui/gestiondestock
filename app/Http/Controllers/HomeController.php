<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Models\Produit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
              if (! Gate::allows('access-admin')){
           return view('commandes.create');
        }
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastproduit = array();
        $arraylist = [7,30,60,120];
       
       
        
        for($i=0;count($arraylist)>$i;$i++)
        {
            $date = Carbon::now()->subDays($arraylist[$i]);
            $produit = Produit::where('created_at', '>=', $date)->get();
         
            if(count($produit)>0)
            {
                $numberdays = $arraylist[$i];
                $lastproduit = $produit;
                break;
            }   
        }
      
        $getquantityproduit = array();
        $getquantityminimalproduit = array();
       
       for($i=$numberdays;$i>0;$i--)
       {

        $from = date('Y-m-d', strtotime('today - '.$i.' days')) ;

        $to = date('Y-m-d', strtotime('today - '.($i-1).' days'));
        $form2 =date('Y-m-d', strtotime('today - '.($i-1).' days'));

        // array_push($getprixproduit,Produit::whereBetween('created_at', [$from, $to])->sum('quantity')) ;

        array_push($getquantityproduit,Produit::where('created_at','<=',$form2)->sum('quantity')) ;

        array_push($getquantityminimalproduit,Produit::where('created_at','<=',$form2)->sum('qauntite_minimale')) ;

       }

       

       $arraysumquantity = array();
       $arraysumquantityminimal = array();

       foreach($getquantityproduit as $item)
       {
            array_push($arraysumquantity,$item);
       }

       foreach($getquantityminimalproduit as $item)
       {
            array_push($arraysumquantityminimal,$item);
       }
      
     

        return view('home',compact('lastproduit','arraysumquantity','arraysumquantityminimal'));
    }
}
