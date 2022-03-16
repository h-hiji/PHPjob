<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;//
use App\Posts;
use App\User;

class NewsController extends Controller
{
    public function add()
  {
      return view('home');
  }

  public function tweet(Request $request)
  {
      $this->validate($request, Posts::$rules);
      $posts = new Posts;
      $form = $request->all();
      $posts->fill($form);
      $posts->save();
      return back();
  }

  public function index(Request $request)
  {
    $users = User::all();
    $posts = Posts::orderBy('created_at', 'desc')->get();;
    return view('home',['posts' => $posts , 'users' => $users]);
  }

  public function delete(Request $request)
  {
    $posts = Posts::find($request->id);
    $posts->delete();
    return redirect('home');
  }

}