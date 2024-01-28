<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\PasswordManager;
use App\Models\Task;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Inbox;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Models\RejectionNote;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }



    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function welcome(){
       return redirect('/users');
   }
    //users

// customer
   public function users(){
    $users = User::get();
    return view('customers', compact('users'));
}

public function user_create(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
        ],
    ]);



    if($validator->fails()) {
       return "Password error: Must be in uppercase, lowercase, number, and symbol";
    }
    $data = $request->except('_token');
    $user = new User();
    $data['password'] = Hash::make($request->password);

    $data['role'] = 'user';
    $data['user_id'] = auth()->user()->id;
    if (User::where('email', $data['email'])->exists()) {
        return redirect()->back()->with('error', 'User with the same email already exists. Please try different Email');
    }

    $user->create($data);
    return redirect()->back()->with('message', 'User has been Created Successfully');
}
public function user_edit(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
    ]);

      if($validator->fails()) {
       return "Password error: Must be in uppercase, lowercase, number, and symbol";
    }

    $data = $request->except('_token');
    $user = User::find($id);

    if ($data['email'] != $user->email && User::where('email', $data['email'])->exists()) {
        return redirect()->back()->with('error', 'User with the same email already exists. Please try a different email.');
    }

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']);
    }

    $user->update($data);

    return redirect()->back()->with('message', 'User has been updated successfully');
}

public function Delete($id)
{
   User::destroy($id);

   return redirect()->back();
} 

 //PasswordManager

public function sites(){
    $sites = PasswordManager::where('user_id',auth()->user()->id)->get();
    return view('PasswordManager', compact('sites'));
}

public function site_create(Request $request){
    // dd($request->all());
    $validator = Validator::make($request->all(), [
    
        'password' => [
            'required',
            'string',
        ],
    ]);

    if($validator->fails()) {
       return "Password error: Must be in uppercase, lowercase, number, and symbol";
    }

    $data = $request->except('_token');
    $site = new PasswordManager();
    
    $data['user_id'] = auth()->user()->id;
    $site->create($data);
    return "Success";
}
public function site_edit(Request $request, $id)
{
        $validator = Validator::make($request->all(), [
        
        'password' => [
            'required',
            'string',
        ],
    ]);

   if($validator->fails()) {
       return "Password error: Must be in uppercase, lowercase, number, and symbol";
    }
    $data = $request->except('_token');
    $site = PasswordManager::find($id);

    $site->update($data);
    return "Successfully updated";
}
public function Deletesites($id)
{
   PasswordManager::destroy($id);

   return redirect()->back();
} 
 //

}
