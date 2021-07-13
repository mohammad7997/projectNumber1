@extends('back.index')
@section('content')

    <div class="col-lg-9 grid-margin stretch-card" style="margin: 20px auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title yekan fontb"> ایجاد مطلب جدید-نویسنده({{$article->user->name}}) </h4>
                @include('layout.message')
                <style>
                    #form {
                        text-align: right;
                        direction: rtl;
                        width: 100%;
                        float: right;
                        padding-bottom: 15px;
                        padding-top: 15px;
                        margin-top: 0;
                        margin-bottom: 50px;
                        position: relative;
                    }

                    #form > div {
                        width: 80%;
                        margin-top: 80px;
                    }

                    #form > div > div {
                        margin-bottom: 15px;
                    }

                    #form > div > div > span {
                        margin-left: 15px;
                        margin-bottom: 10px;
                        display: block;
                        width: 100%;
                        font-family: Yekan;
                        font-size: 12pt;
                    }

                    input {
                        width: 100%;
                        font-size: 10pt;
                        height: 30px;
                    }

                    input:focus {
                        border: 1px solid #616162;
                    }

                    textarea {
                        width: 100%;
                        min-height: 50px;
                    }

                    #submit, #cancel {
                        margin-right: 40%;
                        height: 40px;
                        line-height: 29px;
                    }

                    #cancel {
                        margin-right: 5px;
                    }

                    select {
                        width: 16%;
                        text-align: center;
                        float: right;
                        height: 35px;
                    }

                    .chosen {
                        width: 82%;
                        float: left;
                    }

                    .chosen > span {
                        display: block;
                        float: right;
                        text-align: center;
                        border-radius: 15px;
                        line-height: 38px;
                        margin-right: 1%;
                        margin-bottom: 5px;
                        width: 10%;
                        height: 40px;
                        border: 1px solid #979798;
                        position: relative;
                    }

                    .chosen > span > img {
                        position: absolute;
                        left: 5px;
                        top: 5px;
                        cursor: pointer;
                    }
                </style>
                <form action="{{route('adminUpdateArticle',$article->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div id="form">
                        <div class="container">
                            <div class="row">
                                <span> نام مطلب : </span>
                                <input name="name" value="{{$article->name}}">
                            </div>
                            <div class="row">
                                <span> نام مستعار مطلب : </span>
                                <input name="slug" value="{{$article->slug}}">
                            </div>
                            <div class="row">
                                <span> توضیح : </span>
                                <textarea name="description" class="form-control my-editor">{!! $article->description!!}</textarea>
                            </div>
                            <div class="row">
                                <span> توضیح : </span>
                                <select name="status" class="yekan">
                                    <option value="1" <?php if ($article->status == 1) {
                                        echo 'selected';
                                    } ?>>فعال
                                    </option>
                                    <option value="0" <?php if ($article->status == 0) {
                                        echo 'selected';
                                    } ?>>غیرفعال
                                    </option>
                                </select>

                            </div>
                            <div class="row">
                                <span> توضیح : </span>
                                <select class="yekan" onchange="chosen(this)">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="chosen yekan">
                                    @foreach($article->categories as $catChose)
                                        <span>
                                        <input name="categories[]" type="hidden" value="{{$catChose->id}}"><img
                                                    src="{{asset('back/assets/images/icons8-cancel-16.png')}}"
                                                    class="cancle" onclick="cancle(this)">
                                            {{$catChose->name}}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <button id="submit" type="submit" class="btn btn-success yekan fontn">ثبت تغییرات</button>
                            <a id="cancel" class="btn btn-warning yekan fontn"
                               href="{{route('adminArticle')}}">انصراف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function chosen(x) {
            var tag = $(x);
            var optionText = tag.find(' option:selected ').text();
            var optionId = tag.find(' option:selected ').attr('value');
            var span = '<span><input name="categories[]" type="hidden" value="' + optionId + '"><img src="{{asset('back/assets/images/icons8-cancel-16.png')}}" class="cancle" onclick="cancle(this)">' + optionText + '</span>';
            $('.chosen').append(span)
        }
        function cancle(x){
            var tag=$(x);
            var parent=tag.parents('span');
            parent.remove();
        }
    </script>
@endsection