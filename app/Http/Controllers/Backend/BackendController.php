<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class BackendController extends Controller
{
    public function userCv()
    {
        return view('backend.basicInfo');
    }

    public function storeUserInfo(Request $request)
    {

        $userInfo =   UserInformation::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city

        ]);

        if ($userInfo) {


            return redirect()->route('user.profile')->with([
                'message' => 'User Information Created Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Try agian later!',
            'alert-type' => 'error'
        ]);
    }

    public function editUserInfo()
    {

        $information = UserInformation::where('user_id', Auth::user()->id)->first();
        return view('backend.edit', compact('information'));
    }

    public function updateUserInfo(Request $request)
    {

        $id =  $request->id;

        $info = UserInformation::findOrFail($id)->first();


        if ($info) {
            $info->update([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city

            ]);
        }

        return redirect()->back()->with([
            'message' => 'User Information Updated Successfully',
            'alert-type' => 'success',


        ]);
    }


    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function userProfile()
    {

        return view('backend.profile');
    }

    public function userProfileStore(Request $request)
    {
        $request->validate([
            'desc' => ['required', 'string', 'min:5'],
        ]);


        Profile::create([
            'user_id' => Auth::user()->id,
            'description' => $request->desc,
        ]);

        return redirect()->route('user.skills')->with([
            'message' => 'Description Inserted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function userProfileEdit()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        // return $profile;
        return view('backend.editProfile', compact('profile'));
    }

    public function userProfileUpdate(Request $request)
    {
        $request->validate([
            'desc' => ['required', 'string', 'min:5'],
        ]);
        $id =  $request->id;

        $profile = Profile::findOrFail($id)->first();


        if ($profile) {
            $profile->update([
                'user_id' => Auth::user()->id,
                'description' => $request->desc,
            ]);

            return redirect()->back()->with([
                'message' => 'Description Updated Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error While Updating',
            'alert-type' => 'error',
        ]);
    }

    public function userSkills()
    {
        return view('backend.skills');
    }


    public function userSkillsStore(Request $request)
    {

        $request->validate([
            'skill_name' => ['required', 'string', 'max:255'],
        ]);


        $skill = Skill::create([
            'user_id' => Auth::user()->id,
            'skill_name' => $request->skill_name,
        ]);

        if ($skill) {
            return redirect()->route('user.edu')->with([
                'message' => 'Skills Inserted Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error While Inserting',
            'alert-type' => 'error',
        ]);
    }


    public function userSkillsEdit()
    {
        $skill = Skill::where('user_id', Auth::user()->id)->first();

        // $skills = explode(',', $skill->skill_name);
        return view('backend.editSkills', compact('skill'));
    }

    public function userSkillsUpdate(Request $request)
    {
        $request->validate([
            'skill_name' => ['required', 'string', 'max:255'],
        ]);

        $id =  $request->skill_id;

        $skill = Skill::findOrFail($id)->first();


        if ($skill) {
            $skill->update([
                'user_id' => Auth::user()->id,
                'skill_name' => $request->skill_name,
            ]);

            return redirect()->route('user.edu')->with([
                'message' => 'Skills Updated Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error While Updating',
            'alert-type' => 'error',
        ]);
    }

    public function userEdu()
    {
        $levels = Level::get();

        return view('backend.education', compact('levels'));
    }


    public function userEduStore(Request $request)
    {
        // $request->validate([
        //     'edu' => ['required', 'string', 'max:50'],
        //     'start_date' => ['required', 'date'],
        //     'end_date' => ['required', 'date', 'after:now'],
        //     'level_id' => ['required', 'exists:levels,id'],
        //     'field' => ['required', 'string', 'max:50'],
        //     'desc' => ['required', 'string', 'max:255'],
        // ]);


        $edu = Education::create([
            'user_id' => Auth::user()->id,
            'edu' => $request->edu,
            'start_date' =>  $request->start_date,
            'end_date' => $request->end_date,
            'level_id' => $request->level_id,
            'field' => $request->field,
            'desc' => $request->desc,
        ]);
        if ($edu) {
            return redirect()->route('user.edu.show')->with([
                'message' => 'Education Inserted Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error While Inserting',
            'alert-type' => 'error',
        ]);
    }


    public function showUserEdu()
    {
        $educations = Education::with('level')->get();
        return view('backend.showEducation', compact('educations'));
    }
    public function userEduEdit($id)
    {

        $edu = Education::findOrFail($id)->first();
        $levels = Level::get();
        return view('backend.editEducation', compact('edu', 'levels'));
    }


    public function userEduUpdate(Request $request)
    {
        $edu = Education::findOrFail($request->id)->first();

        if ($edu) {
            $edu->update([
                'edu' => $request->edu,
                'start_date' =>  $request->start_date,
                'end_date' => $request->end_date,
                'level_id' => $request->level_id,
                'field' => $request->field,
                'desc' => $request->desc,
            ]);

            return redirect()->route('user.edu.show')->with([
                'message' => 'Education Updated Successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Error While Updating',
            'alert-type' => 'error',
        ]);
    }


    public function userEduDelete($id)
    {
        $edu = Education::findOrFail($id)->first();
        if ($edu) {
            $edu->delete();
            return redirect()->back()->with([
                'message' => 'Education Deleted Successfully',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Error While Deleting',
            'alert-type' => 'error',
        ]);
    }
}
