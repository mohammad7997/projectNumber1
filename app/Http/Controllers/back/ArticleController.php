<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $article = Article::orderBy('id', 'desc')->paginate(20);
        return view('back.article.article', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('back.article.creatarticle', compact('categories'));
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
        $massage = [
            'name.required' => 'فیلد نام خالی میباشد',

            'description.required' => 'فیلد توضیح خالی میباشد',
            'category.required' => 'دسته بندی ها را مشخص کنید'
        ];

        $request->validate([
            'name' => 'required',

            'description' => 'required',
            'categories' => 'required',
        ], $massage);

        if (empty($request->slug)){
            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
        $request->merge(['slug'=>$slug]);
        $article = new Article();
        try {
            $article = $article->create($request->all());
            $article->categories()->attach($request->categories);
            $msg = 'مطلب با موفقیت ایجاد شد';
            return redirect(route('adminArticle'))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'مطلب ایجاد نشد';
            return redirect(route('adminCreateArticle'))->with('warning', $msg);
        }
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
    public function edit(Article $article)
    {
        //
        $categories = Category::get();
        return view('back.article.editarticle', compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $massage = [
            'name.required' => 'فیلد نام خالی میباشد',
            'slug.required' => 'فیلد نام مستعار خالی میباشد',
            'description.required' => 'فیلد توضیح خالی میباشد',
            'category.required' => 'دسته بندی ها را مشخص کنید'
        ];

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'categories' => 'required',
        ], $massage);

        if (empty($request->slug)){
            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
        $request->merge(['slug'=>$slug]);

        try {
            $article->update($request->all());
            $article->categories()->sync($request->categories);
            $msg = 'مطلب  با موفقیت ویرایش شد';
            return redirect(route('adminArticle'))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'مطلب ایجاد نشد';
            return redirect(route('adminEditArticle'))->with('warning', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Status(Article $article)
    {
        //
        if ($article->status == 1) {
            $article->status = 0;
        } else {
            $article->status = 1;
        }
        try {
            $article->save();
            $msg='تغییر وضعیت با موفقیت انجام شد';
            return redirect(route('adminArticle'))->with('success',$msg);
        } catch (Exception $exception) {
            $msg='تغییر وضعیت انجام نشد';
            return redirect(route('adminArticle'))->with('success',$msg);
        }
    }
}
