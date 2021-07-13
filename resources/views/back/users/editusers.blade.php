@extends('back.index')
@section('content')
    <div class="col-lg-9 grid-margin stretch-card" style="margin: 20px auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title yekan fontb"> ویرایش کاربر <span style="position: relative;top: 3px;right: 5px">({{$user->name}})</span> </h4>
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

                    #submit,#cancel {
                        margin-right: 40%;
                        height: 40px;
                        line-height: 29px;
                    }
                    #cancel{
                        margin-right: 5px;
                    }
                </style>
                <form action="{{route('adminUpdateUsers',$user->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div id="form">
                        <div class="container">
                            <div class="row">
                                <span> نام کاربری : </span>
                                <input name="name" value="{{$user->name}}">
                            </div>
                            <div class="row">
                                <span> ایمیل : </span>
                                <input type="email" name="email" value="{{$user->email}}">
                            </div>
                            <div class="row">
                                <span> تلفن : </span>
                                <input type="text" name="phone" value="{{$user->phone}}">
                            </div>
                            <div class="row">
                                <span> رمز : </span>
                                <input type="text" name="password" >
                            </div>
                            <div class="row">
                                <span> تکرار رمز : </span>
                                <input type="text" name="password_confirmation">
                            </div>
                            <button id="submit" type="submit" class="btn btn-success yekan fontn">ثبت تغییرات</button>
                            <a id="cancel" class="btn btn-warning yekan fontn" href="{{route('adminUsers')}}">انصراف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection