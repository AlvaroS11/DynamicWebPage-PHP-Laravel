<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function update(UpdateProfileRequest $request){

        auth()->user()->update($request->only('name', 'email', 'username', 'birthday', 'me'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }


        if( $request->hasFile( 'file_path' ) ) {
            $destinationPath = storage_path( 'app/public/avatars' );
            $file = $request->file_path;
            $fileName = time() . '.'.$file->clientExtension();
            echo($fileName);
            
            $file->storePublicly('/public/avatars');
           // $file->storeAs('\avatars', $fileName );
           // $file -> store('image', 'public');
            //$file->store( $fileName );
            //dd($file);
           // $file->move($destinationPath, $fileName );
          //  dd($file);
            auth()->user()->update([
                'file_path'=>$file->hashName()
            ]);
        }

        

      /*  
        if ($request->input('file_path')){
        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            auth()->user()->update([
                'file_path' => ($request -> input('file_path'))
        ]);
        $request->user->update('product', 'public');

        // Save the file locally in the storage/public/ folder under a new folder named /product
      //  $request->file->store('users', 'public');
       

      //  $image = $request->file('file_path');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('storage/app/public/images'), $new_name);
    }
    return redirect()->route('profile')->with('message', 'Profile saved successfully');

*/
return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }
    public function store(){

    }
}
