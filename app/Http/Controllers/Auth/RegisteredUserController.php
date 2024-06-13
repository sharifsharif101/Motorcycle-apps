<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\AccountStatus;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
     
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'national_id'=> $request->national_id,
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }

//     public function store(Request $request): RedirectResponse
// {
//     $request->validate([
//         'name' => ['required', 'string', 'max:255'],
//         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
//         'password' => ['required', 'confirmed', Rules\Password::defaults()],
//     ]);

//     // Handle image upload
//     if ($request->hasFile('personal_image')) {
//         // Get file name with extension
//         $fileNameWithExt = $request->file('personal_image')->getClientOriginalName();
//         // Get just file name
//         $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//         // Get just extension
//         $extension = $request->file('personal_image')->getClientOriginalExtension();
//         // Filename to store
//         $fileNameToStore = $fileName.'_'.time().'.'.$extension;
//         // Upload Image
//         $path = $request->file('personal_image')->storeAs('public/images', $fileNameToStore);
//     } else {
//         $fileNameToStore = 'noimage.jpg'; // Default image if no image uploaded
//     }

//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//         'national_id'=> $request->national_id,
//         'personal_image' => $fileNameToStore, // Store file name in database
//     ]);

//     event(new Registered($user));

//     Auth::login($user);

//     return redirect(RouteServiceProvider::HOME);
// }



public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'national_id' => ['required', 'string', 'max:255', 'unique:'.User::class],
        'personal_image' => ['required', 'max:2048'], // Accept only image files up to 2MB
    ]);

    if ($request->hasFile('personal_image')) {
        // Store image in the public storage
        $filePath = Storage::disk('public')->put('images/personal_image/featured-images', $request->file('personal_image'));
    }

    // Store the image path
    $imagePath = $filePath ?? null;

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'national_id' => $request->national_id,
        'personal_image' => $imagePath, // Save the image path
    ]);

    // Create the account status for the user
    AccountStatus::create([
        'user_id' => $user->id,
        'is_active' => true,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}







}
