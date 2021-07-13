<?php

namespace App\Http\Controllers\front;

use App\Mail\CommentSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\frontModel\Article;
use App\Comment;
use Exception;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Article $article)
    {
        //


        $message=[
            'name.required'=>'فیلد نام خالی میباشد',
            'email.required'=>'فیلد ایمیل خالی میباشد',
            'body.required'=>'فیلد متن نظر خالی میباشد',

        ];
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'body'=>'required',
            recaptchaFieldName() => recaptchaRuleName()
        ],$message);

        Mail::to($request->email)->send(new CommentSent($request,$article));
        try {
            $article->comments()->create([
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body
            ]);
            $msg='نظر شما ثبت شده و بعد از تایید مدیر منتشر میشود';
            return redirect(route('article',$article->slug))->with('success',$msg);
        }catch (Exception $exception){
            $msg='خطایی وجود دارد و نظر شما ثبت نشد';
            return redirect(route('article',$article->slug))->with('success',$msg);
        }

    }
}
