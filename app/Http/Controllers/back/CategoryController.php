<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id', 'desc')->paginate(20);
        return view('back.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.category.creatcategory');
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
        $massage=[
            'name.required'=>'فیلد نام خالی میباشد',
            'slug.required'=>'فیلد نام مستعار خالی میباشد',
            'slug.required'=>'فیلد نام مستعار تکراری میباشد'
        ];

        $request->validate([
            'name' => 'required',
            'slug' => 'required | unique:categories',
        ], $massage);


        $category=new Category([
           'name'=>$request->name,
           'slug'=>$request->slug
        ]);
        try{
            $category->save();
            $msg = 'دسته بندی با موفقیت انجام شد';
            return redirect(route('adminCategory'))->with('success', $msg);
        }catch (Exception $exception){
            $msg = 'دسته بندی ایجاد نشد';
            return redirect(route('adminCreateCategory'))->with('warning', $msg);
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
    public function edit(Category $category)
    {
        //
        return view('back.category.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $massage = [
            'name.required' => 'فیلد نام خالی میباشد',
            'slug.required' => 'فیلد نام مستعار خالی میباشد',
            'slug.unique' => 'فیلد نام مستعار تکراری میباشد'
        ];


        $request->validate([
            'name' => 'required',
            'slug' => 'required | unique:categories',
        ], $massage);

        $category->name = $request->name;
        $category->slug = $request->slug;

        try {
            $category->save();
            $msg = 'ویرایش با موفقیت انجام شد';
            return redirect(route('adminCategory'))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'ویرایش انجام نشد';
            return redirect(route('adminEditCategory', $category->id))->with('warning', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        try {
            $category->delete();
            $msg = 'حذف با موفقیت انجام شد';
            return redirect(route('adminCategory'))->with('success', $msg);
        } catch (Exception $exception) {
            $msg = 'حذف انجام نشد';
            return redirect(route('adminEditCategory', $category->id))->with('warning', $msg);
        }
    }
}
