@extends('front.index')
@section('content')
    <style>
        #main {
            width: 90%;
            margin: 0 auto;
            position: relative;

        }

        #main::after {
            content: '';
            display: block;
            clear: both;
        }

        #content {
            width: 70%;
            margin: 0 auto;
            text-align: right;
        }
        #alert {
            width: 50%;
            margin: 40px auto;
        }

        #alert ul {
            text-align: center;
            direction: rtl;
            list-style: none;
        }

        #alert ul li {
            height: 15px;
            margin: 2px 0;
        }
        button{
            position: absolute;
            right: 0;
            left: 0;
            margin: 0 auto;
        }
        form{
            margin-top: 50px;
            height: 125px;
        }
    </style>
    <main id="main" style="margin-top: 170px">
        <div id="content" class="yekan">
            @if(session('resent'))
                <div id="alert" class="alert alert-success" style="margin-bottom: 0">
                    <ul>
                        <li class="yekan fontn">
                            ایمیل فعالسازی برای شما ارسال شد
                        </li>
                    </ul>
                </div>
            @endif
            <form action="{{route('verification.resend')}}" method="get">
                @csrf
                <p style="text-align: center"> روی دکمه ی زیر کلیک کنید تا ایمیل فعالسازی حساب کاربری برای شما ارسال شود </p>
                <button class="btn btn-success" style="margin: 0 auto">ارسال ایمیل</button>
            </form>
        </div>
    </main>
@endsection