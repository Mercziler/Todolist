<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class Itemcontroller extends Controller
{
    //..

   /* public function getindex()
    {
        
        $myitem = Item::all();
        //var_dump($myitem);
     
        return (array(

            'myitem' => $myitem
 
        ));
            

    }*/


    public function addtask(Request $req){
        $name = $req->input('name');
        $ownerid = $req ->input('ownerid');
        $datedebut = $req->input('datedebut');
        $done = $req->input('done');

        $details= array(
            'ownerid' => $ownerid,
            'name' => $name ,
            'end' => $datedebut,
            'done' => $done,
        );

        //$this->middleware('guest');

        /*$validated = $req -> validate([

            'name' => ['required', 'string', 'max:255'],
            'date' => 'required|date|date_format:Y-m-d',
            'password' => ['required', 'string', 'min:8'],

        ]);*/
        
        DB::table('item') -> insert($details);
        $myitem = Item::all();
        return redirect::route('home')->with(array(

            'myitem' => $myitem
        ));
        //return view('home',['myitem' => $myitem]);
    }

    public function deletetask($id){

        //echo $id;
        $data = Item::find($id);
        $data->delete();

        $myitem = Item::all();
        return redirect::route('home')->with(array(

            'myitem' => $myitem
        ));

    }


    public function endtask(Request $req,$id){

        $data = Item::find($id);
        $data->done = 'disabled';
        $data->save();

        $myitem = Item::all();
        return redirect::route('home')->with(array(

            'myitem' => $myitem
        ));

    }



    /*public function postindex(Request $req){

        $taskno = $req->input('item');

        $taskreq = Item::findOrFail($taskno);

        $taskreq->mark();
        return Redirect::route('home');

    }*/

}
