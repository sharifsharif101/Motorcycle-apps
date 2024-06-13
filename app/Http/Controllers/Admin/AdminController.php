<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Motorcycle;
use Illuminate\Support\Facades\Auth;
use App\Models\AccountStatus;
class AdminController extends Controller
{
    // public function index(){
    //     $motorcycles = Motorcycle::all();

    //         $users = User::withCount('motorcycles')->get(); // eager load the count of motorcycles
    //         return view("admin.adminIndex",compact("users"));
    // }

    public function index()
{
    // Fetch users with the count of their motorcycles
    $users = User::withCount('motorcycles')->get();
    return view('admin.adminIndex', compact('users'));
}
public function show($id)
{
    // Find the user by ID
    $user = User::find($id);
    // Check if the user exists
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }
    // Fetch related motorcycles
    $motorcycles = $user->motorcycles;
    // Return the view with the user and their motorcycles
    return view('admin.show', compact('user', 'motorcycles'));
}
    
    public function dashboard()
    {
        $userCount = User::count(); 
        $motorcyclesCount = Motorcycle::count();
        return view("admin.dashboard", compact(['userCount','motorcyclesCount']));
    }
    
    public function deactivate(User $user)
    {
        // Update the account status to false
        $user->accountStatus()->update(['is_active' => false]);

        return redirect()->back()->with('success', 'Account deactivated successfully.');
    }
    public function login(){
        return view("admin.login");
    }
    public function login_submit(Request $request)
    {
        $request->validate([
        "email"=> "required| email",
        "password"=> "required"
        ]);
        $check =$request->all();
        $data = [
            "email" => $check["email"],
            "password" => $check["password"],
        ];
        if (Auth::guard("admin")->attempt($data)) {
            return redirect()->route("admin_dashboard")->with("success","Login Successful");
        } else {
        return redirect()->route("admin_login")->with("error","invalid credentials");
        }

    }

    public function logout()
    {
        Auth::guard("admin")->logout(); 
        return redirect()->route("admin_login")->with("success","logout Successfully");
    }
  public function changeStatus($userId){
    $user = User::find($userId);
 
    if($user){
            if ($user->status) {
                $user->status = 0;
            } else {
                $user->status = 1;
            }
            $user->save();
    }
        return back();
  }
 
















}
