<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Motorcycle;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
     
        $users = User::withCount('motorcycles')->get();
        $motorcycles = Motorcycle::whereNotNull('admin_id')->get();
 
        return view('admin.adminIndex', compact('users','motorcycles'));
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
        $user = auth()->user();
        $userCount = User::count();
        $motorcyclesCount = Motorcycle::count();
        $lastMotorcycleTime = $this->getLastPostTime(); // استدعاء الدالة وتخزين القيمة
        return view("admin.dashboard", compact('userCount', 'motorcyclesCount', 'lastMotorcycleTime'));
    }

    public function getLastPostTime()
    {
        $lastMotorcycle = Motorcycle::latest()->first();
        if ($lastMotorcycle) {
            App::setLocale('ar');
            return $lastMotorcycle->created_at->diffForHumans();
        }

        return 'لم يتم العثور على سجلات';
    }

    public function deactivate(User $user)
    {
        // Update the account status to false
        $user->accountStatus()->update(['is_active' => false]);

        return redirect()->back()->with('success', 'Account deactivated successfully.');
    }

    public function login()
    {
        return view("admin.login");
    }   

    public function login_submit(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $data = $request->only('email', 'password');
        if (Auth::guard("admin")->attempt($data)) {
            Auth::logout();
            return redirect()->route("admin_dashboard")->with("success", "Login Successful");
        } else {
            return redirect()->route("admin_login")->with("error", "Invalid credentials");
        }
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("admin_login")->with("success", "Logout Successfully");
    }

    public function changeStatus($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->status = !$user->status;
            $user->save();
        }

        return back();
    }


    public function create()
    {
        $user_id = auth()->guard('admin')->user()->id;
         return view('admin.motorCycleCreate', compact('user_id'));
    }


    public function update(Request $request, $id)
    {
        $motorcycle = Motorcycle::find($id);

        // Update motorcycle details
        $motorcycle->motorcycle_name = $request->input('motorcycle_name');
        $motorcycle->motorcycle_type = $request->input('motorcycle_type');

        // Check if a new contract_pdf file has been uploaded
        if ($request->hasFile('contract_pdf')) {
            $file = $request->file('contract_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $motorcycle->contract_pdf = $fileName;
        }

        $motorcycle->save();

   
        return redirect()->back()->with('success', 'تم تحديث تفاصيل الدراجة النارية بنجاح.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'motorcycle_name' => 'required|string|max:255',
            'motorcycle_type' => 'required|string|max:255',
            'contract_pdf' => 'required|file|mimes:pdf|max:2048', // Adjust maximum file size as needed
        ]);

        if ($request->hasFile('contract_pdf')) {
            $filePath = Storage::disk('public')->put('contract_pdfs', $request->file('contract_pdf'));
            $data['contract_pdf'] = $filePath;
        }

 
            $user_id = auth()->guard('admin')->user()->id;;
    

        $data['admin_id'] = $user_id;
        Motorcycle::create($data);
        return redirect()->back()->with('success', 'Motorcycle created successfully!');
    }

    public function edit($id)
    {
        // Fetch the motorcycle details based on the provided ID
        $motorcycle = Motorcycle::findOrFail($id);

        // Assuming you want to pass the motorcycle details to a view for editing
        return view('admin.motorCycleEdit', compact('motorcycle'));
    }


    public function delete($id){
        $motorcycle = Motorcycle::find($id);
     
        $motorcycle->delete();
        return  redirect()->back()->with('danger', ' تم الحذف بنجاح.');
    }



















}
