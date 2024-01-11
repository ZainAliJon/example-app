<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Task;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Inbox;
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
        return view('home');
    }
// customer
    public function customers(){
        $customers = User::where('role', 'customer')->get();
        return view('customers', compact('customers'));
    }

    public function customer_create(Request $request){
        $data = $request->except('_token');
        $user = new User();
        $data['password'] = Hash::make($request->password);
                          if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        $data['role'] = 'customer';
        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'User with the same email already exists. Please try different Email');
        }
        $user->create($data);
        return redirect()->back()->with('message', 'Customer has been Created Successfully');
    }
    public function customer_edit(Request $request, $id)
    {
        $data = $request->except('_token');
        $user = User::find($id);
                          if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        if ($data['email'] != $user->email && User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'User with the same email already exists. Please try a different email.');
        }
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->back()->with('message', 'Customer has been updated successfully');
    }

// classifier
    public function classifiers(){
        $classifiers = User::where('role', 'classifier')->get();
        return view('classifiers', compact('classifiers'));
    }

    public function classifier_create(Request $request){
        $data = $request->except('_token');
        $user = new User();
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'classifier';

            if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }

        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'User with the same email already exists. Please try different Email');
        }
        // dd($data);
        $user->create($data);
        return redirect()->back()->with('message', 'Classifier has been Created Successfully');
    }
    public function classifier_edit(Request $request, $id)
    {
        $data = $request->except('_token');
        $user = User::find($id);
                  if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        if ($data['email'] != $user->email && User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'User with the same email already exists. Please try a different email.');
        }
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->back()->with('message', 'Customer has been updated successfully');
    }

// tasks
    public function tasks(){
        $classifiers = User::where('role', 'classifier')->get();
        $sellers = Seller::all();
        $buyers=Buyer::all();
         if(auth()->user()->role == "Admin"){

        $tasks = Task::all();
        $pending_tasks = Task::where('status', 'pending')->get();
        $in_reviews_tasks = Task::where('status', 'in_review')
        ->with(['rejection' => function ($query) {
            $query->where('status', 'in_review');
        }])
        ->get();
        $reviewed_tasks = Task::where('status', 'reviewed')->with(['rejection' => function ($query) {
            $query->where('status', 'reviewed');
        }])
        ->get();
        $done_tasks = Task::where('status', 'done')->get();
        }
        if(auth()->user()->role == "classifier"){
            $tasks = Task::where('classifier_id', auth()->user()->id)->get();
            $pending_tasks = Task::where('status', 'pending')->where('classifier_id', auth()->user()->id)->get();
                $in_reviews_tasks = Task::where('status', 'in_review')
        ->with(['rejection' => function ($query) {
            $query->where('status', 'in_review');
        }])->where('classifier_id', auth()->user()->id)->get();
            
            $reviewed_tasks = Task::where('status', 'reviewed')->where('classifier_id', auth()->user()->id)->get();
            $done_tasks = Task::where('status', 'done')->where('classifier_id', auth()->user()->id)->get();
        }
        if(auth()->user()->role == "customer"){
         
                     $tasks = Task::where('customer_id', auth()->user()->id)->get();
            $pending_tasks = Task::where('status', 'pending')->where('customer_id', auth()->user()->id)->get();
                $in_reviews_tasks = Task::where('status', 'in_review')
        ->with(['rejection' => function ($query) {
            $query->where('status', 'in_review');
        }])->where('customer_id', auth()->user()->id)->get();
            
            $reviewed_tasks = Task::where('status', 'reviewed')->where('customer_id', auth()->user()->id)->get();
            $done_tasks = Task::where('status', 'done')->where('customer_id', auth()->user()->id)->get();

        }
        return view('tasks', compact('classifiers', 'tasks', 'pending_tasks', 'in_reviews_tasks', 'reviewed_tasks', 'done_tasks', 'sellers','buyers'));
    }

    public function task_create(Request $request){
        $data = $request->except('_token');
        $obj = new Task();
        $data['customer_id'] = auth()->user()->id;
        // dd($data);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('task', $imageName, 'public');
            $imagePath = url('/storage/app/public/')."/".$imagePath;
            $data['file'] = $imagePath;
        }
        $obj->create($data);
        return redirect()->back()->with('message', 'Task has been Created');
    }
        public function task_edit(Request $request,$id){
        $data = $request->except('_token');
        $task =Task::find($id);
        $data['customer_id'] = auth()->user()->id;
        // dd($data);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('task', $imageName, 'public');
            $imagePath = url('/storage/app/public/')."/".$imagePath;
            $data['file'] = $imagePath;
        }
        $task->update($data);
        return redirect()->back()->with('message', 'Task has been updated');
    }


    public function change_status(Request $request, $id){
        // dd($request->all());
        $task = Task::find($id);
        if($request->status == "Accept"){
            $task->status = "done";
            $task->number = $request->number;
        }elseif($request->status == "reviewed"){
            $task->status = "reviewed";
            $obj = new RejectionNote();
            $obj->note = $request->note;
            $obj->status = "reviewed";
            $obj->task_id = $id;
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->extension();
                $imagePath = $image->storeAs('task', $imageName, 'public');
                $imagePath = url('/storage/app/public/')."/".$imagePath;
                $obj->file = $imagePath;
            }
            $obj->save();
        }else{
            $task->status = "in_review";
            $obj = new RejectionNote();
            $obj->note = $request->note;
            $obj->status = "in_review";
            $obj->task_id = $id;
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->extension();
                $imagePath = $image->storeAs('task', $imageName, 'public');
                $imagePath = url('/storage/app/public/')."/".$imagePath;
                $obj->file = $imagePath;
            }
            $obj->save();
        }
        $task->save();
        // dd($request->all(), $id);
        return redirect()->back()->with('message', 'Revision Successfully Added');
    }

    public function inbox($id){
        $task = Task::with('inboxes.user')->find($id);
        return view('inbox', compact('task'));
    }

    public function compose(Request $request, $id){
        if($request->isMethod('post')){
            // dd($request->all());
            $obj = new Inbox();
            $data = $request->except('_token');
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = time() . '.' . $image->extension();
                $imagePath = $image->storeAs('task', $imageName, 'public');
                $imagePath = url('/storage/app/public/')."/".$imagePath;
                $data['attachment'] = $imagePath;
            }
            $data['task_id'] = $id;
            $data['user_id'] = auth()->user()->id;
            // dd($data);
            $obj->create($data);
            return redirect(url('/task/inbox/')."/".$id)->with('message', "Message has been sent successfully !");
        }
        $task = Task::find($id);
        $total = Inbox::all()->count();
        return view('compose', compact('task', 'total'));
    }
    public function readMessage($id){
        $inbox = Inbox::with('user')->find($id);
        $total = Inbox::all()->count();
        // dd($total);
        return view('read-mail', compact('inbox', 'total'));
    }


    // 

    public function buyers(){
        $buyers = Buyer::all();
        return view('buyers', compact('buyers'));
    }

    public function buyer_create(Request $request){
        $data = $request->except('_token');
        $user = new Buyer();
                         if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        $user->create($data);
        return redirect()->back()->with('message', 'Buyer has been Created Successfully');
    }
    public function buyer_edit(Request $request, $id)
    {
        $data = $request->except('_token');
        $user = Buyer::find($id);
                         if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        $user->update($data);
        return redirect()->back()->with('message', 'Buyer has been updated successfully');
    }

    public function sellers(){
        $sellers = Seller::all();
        return view('sellers', compact('sellers'));
    }

    public function seller_create(Request $request){
        $data = $request->except('_token');
        $user = new Seller();
                         if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        $user->create($data);
        return redirect()->back()->with('message', 'Seller has been Created Successfully');
    }
    public function seller_edit(Request $request, $id)
    {
        $data = $request->except('_token');
        $user = Seller::find($id);
                         if ($request->hasFile('image')) {
        $profileImage = $request->file('image');
        $profileImageName = time() . '_' . $profileImage->getClientOriginalName();

        $directory = 'images';
        $profileImage->storeAs($directory, $profileImageName, 'public');
        $url =url('/');
        $completeImagePath = $url.'/'.'storage/app/public/' . $directory . '/' . $profileImageName;

        $data['image'] = $completeImagePath;
    }
        $user->update($data);
        return redirect()->back()->with('message', 'Seller has been updated successfully');
    }

    // 
}
