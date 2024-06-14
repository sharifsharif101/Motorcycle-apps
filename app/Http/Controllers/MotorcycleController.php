<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle; // Assuming Motorcycle is your model
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use Illuminate\Support\Facades\Auth; // Import Auth for authenticated user
use App\Models\User; // Assuming your User model is in the App\Models namespace

class MotorcycleController extends Controller
{
 

    public function index($userId)
    {
        // Query to find all motorcycles that belong to the specific user ID
        $motorcycles = Motorcycle::where('user_id', $userId)->get();
        
        // Retrieve the user details based on the user ID
        $user = User::findOrFail($userId);
    
        // Return the view with the motorcycles data and the user's name
        return view('motorCycleIndex', [
            'motorcycles' => $motorcycles,
            'userId' => $userId,
            'userName' => $user->name // Pass the user's name to the Blade template
        ]);
    }
    
    public function create()
    {
        $user_id = auth()->user()->id; 
 
        return view('motorCycleCreate', compact('user_id'));
    }


    public function edit($id)
    {
        
        $motorcycle = Motorcycle::find($id);
        // dd($motorcycle);
        return view('motorCycleEdit', compact('motorcycle'));
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

        $userID = auth()->id();
        return redirect('Show-My-Motors/' . $userID)->with('success', 'تم تحديث تفاصيل الدراجة النارية بنجاح.');
    }

    public function delete($id){
        $motorcycle = Motorcycle::find($id);
        $motorcycle->delete();
        return  redirect()->back()->with('danger', ' تم الحذف بنجاح.');
    }

     

    public function store(Request $request)
    {
       

        // Validate the incoming request data
        $data = $request->validate([
            'motorcycle_name' => 'required|string|max:255',
            'motorcycle_type' => 'required|string|max:255',
            'contract_pdf' => 'required|file|mimes:pdf|max:2048', // Adjust maximum file size as needed
        ]);
     
        // Dump and die the validated data for debugging
       
        if ($request->hasFile('contract_pdf')) {
            $filePath = Storage::disk('public')->put('contract_pdfs', $request->file('contract_pdf'));
            $data['contract_pdf'] = $filePath; // Add file path to the data array
        } else {
            // Handle the case where no PDF is uploaded (optional)
            // You can throw an exception, set a default value for $filePath, etc.
        }
      

        // Get the authenticated user
        $user = Auth::user();

        // Add user_id to the data array
        $data['user_id'] = $user->id;
        // Create a new motorcycle associated with the user
        Motorcycle::create($data);
        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Motorcycle created successfully!');
       
    }


}








