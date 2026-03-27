<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin', '0')->paginate(10);
        return view('admin.users.viewusers', compact('allusers'))->with('no', 1);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $allusers = [$user]; // View expect a collection-ish or single user? 
        // Original: User::all()->where('id',$request->id);
        return view('admin.users.viewuserinfo', compact('allusers'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        
        session()->flash('notif', 'User Updated Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('notif', 'User Trashed Successfully');
        return redirect()->back();
    }

    public function admins()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin', '1')->paginate(10);
        return view('admin.admins.viewadmins', compact('allusers'))->with('no', 1);
    }

    public function search(Request $request)
    {
        $query = $request->input('searchusers');
        $userinfo = User::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('phonenumber', 'like', '%' . $query . '%')
            ->get();
            
        return view('admin.users.searchresults', compact('userinfo'));
    }
}
