<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Company\Company;
use phpseclib\Crypt\Hash;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('auth.users.index',compact('users'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('auth.users.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Upload picture
        $picture = $request->file('picture');
        if ($picture) {
            $request['picture'] = $picture->store('uploads/users');
        }

        //password checking
        $pass=$request['password'];
        $confirm_pass=$request['password_confirmation'];
        if ($pass!=$confirm_pass) {
            $message = 'Passwords Do not Match';
            flash($message)->warning();
            return view('auth.users.create',compact('password','password_confirmation','name','email','picture'));
        }
        else{
            $request['password'] =bcrypt($pass);
            // Create user
            $user = User::create($request->input());
            // User::create(['name'=>$request['name'],'email'=>$request['email'],'password'=>$password,'picture'=>$request['picture']]);
            // Attach companies
            $user->companies()->attach($request['companies']);

            $message = trans('messages.success.added', ['type' => trans_choice('general.users', 1)]);

            flash($message)->success();

            return redirect("auth/users"); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $companies = Company::all();
        return view('auth.users.edit',compact('user','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,Request $request)
    {   
        // Upload picture
        $picture = $request->file('picture');
        if ($picture) {
            $request['picture'] = $picture->store('uploads/users');
        }

         // Do not reset password if not entered/changed
        if (empty($request['password'])) {
            unset($request['password']);
            unset($request['password_confirmation']);
        }
        
        $pass=$request['password'];
        $confirm_pass=$request['password_confirmation'];
        if ($pass!=$confirm_pass) {
            $message = 'Passwords Do not Match';
            flash($message)->warning();
            return view('auth.users.edit',compact('user','password','password_confirmation','name','email'));
        }
        else{
            $request['password'] =bcrypt($pass);
            $user->update($request->input());
            $message = trans('messages.success.updated', ['type' => trans_choice('general.users', 1)]);
            flash($message)->success();
            return redirect('auth/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.users', 1)]);
        flash($message)->success();
        return redirect('auth/users');    
    }
}
