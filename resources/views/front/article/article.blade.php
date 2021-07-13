@extends('front.index')
@section('content')
    <style>
        #main {
            width: 90%;
            margin: 0 auto;
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

        .comment_top {
            width: 100%;
            height: 50px;
            float: right;
            margin: 40px 0;
        }

        .comment_top div {
            float: right;
            width: 48%;
        }

        .comment_top div:last-child {
            float: left;
        }

        .comment_top span {
            display: block;
            margin-right: 15px;
        }

        .comment_top input {
            width: 80%;
            border-radius: 10px;
        }

        .comment_down {
            width: 100%;
            height: auto;
        }

        .comment_down span {
            display: block;
            border-radius: 10px;
        }

        .comment_down textarea {
            width: 91%;
            min-height: 200px;
        }
    </style>
    <main id="main" style="margin-top: 170px">
        <div id="content" class="yekan">
            <h3> {{$article->name}} </h3>
            <ul>
                <li>
                    <span> نویسنده : </span>
                    ( {{$article->user->name}} )
                </li>
                <li>
                    <span> تاریخ انتشار : </span>
                    <span style="font-family: Tahoma;font-size: 10.5pt">
               ( {!! jDate::forge($article->created_at)->format('%d-%B-%Y'); !!} )
                </span>
                </li>
            </ul>
            <div>
                {!! $article->description !!}
            </div>

            <hr>

            <div style="margin-bottom: 40px">
                @include('layout.message')
                <form action="{{route('StoreComment',$article->slug)}}" method="post">
                    @csrf
                    <div class="comment_top yekan">
                        @auth
                            <div>
                                <span class="fontn"> نام : </span>
                                <input name="name" value="{{Auth::user()->name}}" readonly>
                            </div>
                            <div>
                                <span class="fontn"> ایمیل : </span>
                                <input name="email" type="email" value="{{Auth::user()->email}}" readonly>
                            </div>
                        @else

                            <div>
                                <span class="fontn"> نام : </span>
                                <input name="name" value="kdkdkskks">
                            </div>
                            <div>
                                <span class="fontn"> ایمیل : </span>
                                <input name="email" type="email">
                            </div>
                        @endauth
                    </div>
                    <div class="comment_down">
                        <span class="fontn"> متن نظر : </span>
                        <textarea name="body"></textarea>
                    </div>
                    {!! htmlFormSnippet() !!}
                    <button class="btn btn-success" style="margin: 10px 0"> ارسال نظر</button>

                </form>
            </div>

            <div>
                @foreach($comments as $row)
                    <div>
                        <ul>
                            <li>نام : {{$row->name}}</li>
                            <li>تاریخ : {!! jDate::forge($row->created_at)->format('%d-%B-%Y'); !!}</li>
                        </ul>
                        <p>{{$row->body}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <script>
        var paginate = $('ul.pagination');
        var cssWidth = paginate.css('width');
        var width_ul = parseFloat(cssWidth) / 2;
        var width_main = parseFloat($('#main').css('width')) / 2;
        var left = width_main - width_ul;
        paginate.css('left', left)
    </script>
@endsection
