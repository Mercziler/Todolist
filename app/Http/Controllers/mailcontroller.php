<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Mail\Testmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;



class mailcontroller extends Controller
{
    

    public function sendmail(Request $req){


        $this->middleware('guest');
        

        $password = $req->input('password');
        $name = $req->input('name');
        $email = $req->input('email');


        $details = [

            'title' => 'Mail from HIT',
            'body' => 'Thanks you for your subscription '.$name.' your password is:'.$password.''
        ];
        Mail::to($req->input('email'))->send(new Testmail($details));


        $users = array(    

            'name' => $name ,
            'password' => Hash::make($password),
            'email' => $email,
        );

        $sestab = array(

            'name' => $name ,
           
            'email' => $email,
        );




        $validated = $req -> validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);

                            ///////////////register
        
        DB::table('users') -> insert($users);

        $myitem = Item::all();

        if (Auth::attempt($validated)) {
            
            $req->session()->regenerate();
 
            //return redirect()->intended('home');
            return view('home',['myitem' => $myitem]);

           
            
        }

    }

}
