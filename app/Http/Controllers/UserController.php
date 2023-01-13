<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
Use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $userData = CustomerInformation::where('user_id', Auth::id())->first();
        //dd($userData);
        return view('profile', compact('userData'));
    }

    public function update(Request $request)
    {
        $request->validate($this->rules());
        $saveData = CustomerInformation::findOrFail($request->id);
        $saveData->user_id = Auth::id();
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $saveData->image = $filename;
        }
        $saveData->save();
        return redirect()->back();
    }

    public function rules(){
        return [
            'image' => 'required|mimes:jpeg,bmp,png'
        ];
    }
}
