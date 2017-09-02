<?php
namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
      $this->middleware('guest', ['except' => [ 'destroy'] ]);
    }
    
    public function create(){
      return view('sessions.create');
    }
    
    public function store(){
        
      if (! auth()->attempt(request(['name', 'password']))){
          session()->flash('message3', 'Wrong Credentials!');
        return redirect('/admin');
      }

      return redirect('/cms');
    }
    
    public function destroy(){
        auth()->logout();
    return redirect('/');
    }
    
}
