<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function userCv(){
        return view('backend.basicInfo');
    }

    public function storeUserInfo(Request $request){

      $userInfo =   UserInformation::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city
            
        ]);


        
        if($userInfo){


            return redirect()->back()->with([
                'message' => 'User Information Created Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Try agian later!',
            'alert-type' => 'error'
        ]);


    }


    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
