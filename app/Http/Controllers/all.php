<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class all extends Controller
{
  public function shownewphoto()
{  $title = 'New Photos';
 $photos = DB::table('photos')->get();
//  $photos = DB::table('photos')->where('id',);

  return view('all/mallphoto', compact('title','photos'));
}

public function viewphoto($id)
{  $title = 'New Photos';

$photo = DB::table('photos')->where('id', $id)->first();
//  $photos = DB::table('photos')->where('id',);

return view('user/view', compact('title','photo'));
}
}
