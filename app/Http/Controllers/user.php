<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use Auth;


class user extends Controller

{

  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile($id)
  {
      $title = 'Profile';
      return view('user/profile', compact('title'));
  }

  public function upload()
  {
      $title = 'Upload photo';
      return view('user/upload', compact('title'));
  }

  public function uploadafteredit(Request $request, $id)
  {


      $ptex =  $request->input('p_text');

      $cover_image = $request->file('img_name');

      if ($cover_image) {
          $cover_image_filename = $cover_image->getClientOriginalName();
          $cover_image->move(public_path('images'), $cover_image_filename);

          DB::table('photos')->where('id', $id)->update(array(

            'p_text' => $ptex,
            'img_name' => $cover_image_filename
          ));

    }else {
      DB::table('photos')->where('id', $id)->update(array(
        'p_text' => $ptex
      ));
  }


      return \Redirect::route('user.upload')->with('message', 'Gallery Created')  ;


  }



  public function store_photo(Request $request)
  {


    $this->validate($request,[
       'p_text' => 'required'
    ]);

 if (Auth::check()) {

   $ptex =  $request->input('p_text');
   $usid =  auth()->user()->id;

   $cover_image = $request->file('img_name');

   if ($cover_image) {
       $cover_image_filename = $cover_image->getClientOriginalName();
       $cover_image->move(public_path('images'), $cover_image_filename);
 }else {   $cover_image_filename = 'noimage.jpg';    }

   DB::table('photos')->insert(
     [
       'p_text' => $ptex,
       'user_id' => $usid,
       'img_name' => $cover_image_filename
     ]
   );
   return \Redirect::route('user.upload')->with('message', 'Gallery Created')  ;
}else {
  return view('/home');
}

 }



 public function editphoto( $id)
 {



   $photo = DB::table('photos')->where('id', $id)->first();

    if(auth()->user()->id == $photo->user_id):
      return view('user/edit', compact('photo'));
  else:
    return \Redirect::route('allphoto');
  endif;



}


public function destroy($id)
    {
        $photo = DB::table('photos')->where('id', '=', $id);
        if(auth()->user()->id != $photo->first()->user_id){
            return redirect('allphoto');
        }else {
          File::delete(public_path() . '/images/' . $photo->first()->img_name);

          $photo->delete();
          return redirect('allphoto');
        }



    }


}
