<?php

namespace App\Http\Controllers\back;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comment = Comment::orderBy('id', 'desc')->paginate(20);
        return view('back.comment.comments', compact('comment'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        return view('back.comment.editcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $massage = [
            'name.required' => 'فیلد نام خالی میباشد',
            'email.required' => 'فیلد ایمیل  خالی میباشد',
            'body.required' => 'فیلد توضیح خالی میباشد',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ], $massage);
        try {
            $comment->update($request->all());
            $msg = 'نظر  با موفقیت ویرایش شد';
            return redirect(route('adminComment'))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'نظر ایجاد نشد';
            return redirect(route('adminEditComment',$comment->id))->with('warning', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        try{
            $comment->delete();
            $msg = 'حذف  با موفقیت انجام شد';
            return redirect(route('adminComment'))->with('success', $msg);
        }catch (Exception $exception){
            $msg = 'حذف انجام نشد';
            return redirect(route('adminComment'))->with('success', $msg);
        }

    }

    public function status(Comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }


        try {
            $comment->save();
            $msg='تغییر وضعیت با موفقیت انجام شد';
            return redirect(route('adminComment'))->with('success',$msg);
        } catch (Exception $exception) {
            $msg='تغییر وضعیت انجام نشد';
            return redirect(route('adminComment'))->with('success',$msg);
        }
    }
}
