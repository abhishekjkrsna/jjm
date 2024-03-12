<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roles;
use App\Models\Verticals;
use App\Models\Projects;
use App\Models\Vendors;
use App\Models\Teams;
use App\Models\Vassociations;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $roles = Roles::all();
        $projects = Projects::all();
        $vendors = Vendors::all();
        $users = User::all();
        $verticals = Verticals::all();
        $ud = sizeof(Vassociations::distinct()->pluck('state'));
        return view('dashboard', compact('user', 'roles', 'projects', 'vendors', 'users', 'verticals', 'ud'));
    }


    public function addProject()
    {
        $user = Auth::user();
        $users = User::all();
        $verticals = Verticals::all();
        return view('dashboard.add-project', compact('user', 'users', 'verticals'));
    }

    public function addRole()
    {
        return view('dashboard.add-role');
    }
    public function addUser()
    {
        $user = Auth::user();
        $roles = Roles::all();
        $verticals = Verticals::all();
        return view('dashboard.add-user', compact('user', 'roles', 'verticals'));
    }
    public function addVertical()
    {
        $user = Auth::user();
        $roles = Roles::all();
        $users = User::all();
        return view('dashboard.add-vertical', compact('users', 'user', 'roles'));
    }
    public function addVendor()
    {
        $user = Auth::user();
        $roles = Roles::all();
        $users = User::all();
        return view('dashboard.add-vendor', compact('users', 'user', 'roles'));
    }
    public function associateVendor()
    {
        $user = Auth::user();
        $projects = Projects::all();
        $vendors = Vendors::all();
        return view('dashboard.associate-vendor', compact('user', 'projects', 'vendors'));
    }
    public function addTeam()
    {
        $user = Auth::user();
        $projects = Projects::all();
        $users = User::all();
        return view('dashboard.add-team', compact('user', 'projects', 'users'));
    }
    public function addMember()
    {
        $user = Auth::user();
        $teams = Teams::all();
        $users = User::all();
        $roles = Roles::all();
        $projects = Projects::all();
        return view('dashboard.add-member', compact('user', 'teams', 'users', 'roles', 'projects'));
    }
}
