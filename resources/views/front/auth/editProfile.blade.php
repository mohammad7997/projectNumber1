@extends('front.index')
@section('content')

    <main id="main">
        <section id="about">
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
                    width: 50%;
                    margin-right: 40%;
                    margin-top: 80px;
                }

                #form > div > div {
                    margin-bottom: 15px;
                }

                #form > div > div > span {
                    margin-left: 15px;
                    display: block;
                    width: 100px;

                }

                input {
                    width: 200px;
                    font-size: 10pt;
                    height: 30px;
                }

                #submit {
                    margin-right: 20%;
                    margin-top: 15px;
                }
            </style>
            <form action="{{route('updateProfile',$user->id)}}" method="post">
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
                            <span> تلفن همراه : </span>
                            <input type="text" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="row">
                            <span> رمز : </span>
                            <input type="text" name="password" >
                        </div>
                        <div class="row">
                            <span> تکرار رمز : </span>
                            <input type="text" name="password_confirmation" >
                        </div>
                        <button id="submit" type="submit" class="btn btn-success">ثبت اطلاعات</button>
                    </div>
                </div>
            </form>
        </section><!-- #about -->
    </main>

@endsection