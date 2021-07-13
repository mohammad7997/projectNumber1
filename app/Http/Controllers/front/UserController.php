<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\frontModel\User;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('front.auth.editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $message = [
            'name.required' => 'فیلد نام کاربری خالی است',
            'email.required' => 'فیلد ایمیل خالی است',
            'phone.required' => 'فیلد تلفن همراه خالی است',
            'password.required' => 'فیلد رمز خالی است'
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required ',
            'phone' => 'required ',
            'password'=>'required'
        ],$message);

        $passwod=Hash::make($request->Password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $passwod;
        try {
            $user->save();
            $msg='ویرایش با موفقیت انجام شد';
            return redirect(route('editProfile',$user->id))->with('success',$msg);
        }catch (Exception $exception){
            $msg='ویرایش ناموفق';
            return redirect(route('editProfile',$user->id))->with('warning',$msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
