<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
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
        $userInfo = User::orderBy('id', 'desc')->get();
        return view('back.users.users', compact('userInfo'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('back.users.editusers', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $message = [
            'name.required' => 'فیلد نام کاربری خالی است',
            'email.required' => 'فیلد ایمیل خالی است',
            'phone.required' => 'فیلد تلفن همراه خالی است',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required ',
            'phone' => 'required ',
        ], $message);

        if (!empty($request->password)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $password = Hash::make($request->password);
            $user->password = $password;
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
        }

        try {
            $user->save();
            $msg = 'ویرایش باموقیت انجام شد';
            return redirect(route('adminEditUsers', $user->id))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'ویرایش انجام نشد';
            return redirect(route('adminEditUsers', $user->id))->with('warning', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            $msg = 'حذف باموقیت انجام شد';
            return redirect(route('adminUsers', $user->id))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'حذف انجام نشد';
            return redirect(route('adminUsers', $user->id))->with('warning', $msg);
        }
    }

    public function Status(User $user)
    {
        //
        if ($user->statuse == 1) {
            $user->statuse = 0;
        } else {
            $user->statuse = 1;
        }
        try {
            $user->save();
            $msg='تغییر وضعیت با موفقیت انجام شد';
            return redirect(route('adminUsers'))->with('success',$msg);
        } catch (Exception $exception) {
            $msg='تغییر وضعیت انجام نشد';
            return redirect(route('adminUsers'))->with('success',$msg);
        }
    }

}
