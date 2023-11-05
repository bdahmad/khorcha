<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    public function index()
    {
        $all = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('all'));
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function edit($slug)
    {
        $data = User::where('status',1)->where('slug',$slug)->firstOrfail();
        return view('admin.user.edit',compact('data'));
    }
    public function view($slug)
    {
        $data = User::where('status',1)->where('slug',$slug)->firstOrfail();
        return view('admin.user.view',compact('data'));
    }
    public function insert(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required | min:8',
            'confirmPassword' => 'required | required_with:password|same:password|min:8',
            'role' => 'required',
        ],[
            'name.required' => 'Please enter Full name.',
            'email.required' => 'Please enter valid email address.',
            'username.required' => 'Please enter username.',
            'password.required' => 'Please enter password.',
            'confirmPassword.required' => 'Please enter confirm password.',
            'role.required' => 'Please select role.',
        ]);
        $slug = 'User'.uniqid(20);

        $insert = User::insertGetId([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = 'User_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/users/'.$imageName);

            User::where('id',$insert)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if($insert){
            return redirect()->route('add-user')->with('success','Successfully add new user.');
        }else{
            return redirect()->route('add-user')->with('error','Operation Failed.');

        }
    }
    public function update(Request $request)
    {
        $id = $request['id'];
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Please enter Full name.',
            'email.required' => 'Please enter valid email address.',
            'role.required' => 'Please select role.',
        ]);
        $slug = 'User'.uniqid(20);

        $update = User::where('status',1)->where('id',$id)->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'username' => $request['username'],
            'role' => $request['role'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = 'User_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/users/'.$imageName);

            User::where('id',$id)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if($update){
            return redirect('dashboard/user')->with('success','Successfully update user information.');
        }else{
            return redirect('dashboard/user/edit/'.$slug)->with('error','Operation Failed.');

        }

    }
    public function softDelete(Request $request)
    {
        $id = $request['modal_id'];
        $soft = User::where('status',1)->where('id',$id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            return redirect()->route('all-user')->with('success',' Successfully delete user information.');
        }else{
            return redirect()->route('all-user')->with('error',' Operation failed.');
        }
    }
    public function restore(Request $request)
    {
        $id = $request['restore_id'];
        $soft = User::where('status',0)->where('id',$id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            return redirect()->route('user')->with('success',' Successfully restore user information.');
        }else{
            return redirect()->route('user')->with('error',' Operation failed.');
        }
    }
    public function delete(Request $request)
    {
        $id = $request['delete_id'];
        $soft = User::where('status',0)->where('id',$id)->delete([]);
        if($soft){
            return redirect()->route('user')->with('success',' Successfully permanently delete user information.');
        }else{
            return redirect()->route('user')->with('error',' Operation failed.');
        }
    }
}
