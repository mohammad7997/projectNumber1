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
        }

        .card_article {
            width: 23%;
            height: auto;
            float: right;
            margin-left: 2%;
            text-align: center;
        }

        .card_article:last-child {
            margin-left: 0;
        }

        img {
            width: 200px;
            height: 200px;
        }

        #link {
            width: 100%;
            height: 70px;
            float: right;
            position: relative;
        }

        ul.pagination {
            bottom: 0;
            position: absolute;
            left: 0;
        }
    </style>
    <main id="main" style="margin-top: 170px">
        @include('layout.message')
        <div id="content">
            @foreach($articles as $article)
                <div class="card_article">
                    <img src="{{$article->image}}">
                    <h3 style="margin-top: 5px"><a href="{{route('article',$article->slug)}}">{{$article->name}}</a></h3>
                    <ul>
                        <li>
                            <span> نویسنده : </span>
                            <span style="font-family: Tahoma;font-size: 9pt">
                            ( {{$article->user->name}} )
                            </span>
                        </li>
                        <li>
                            <span> تاریخ انتشار : </span>
                            <span style="font-family: Tahoma;font-size: 9pt">
                                ( {!! jDate::forge($article->created_at)->format('%d-%B-%Y'); !!} )
                            </span>
                        </li>
                    </ul>
                    <p><?php echo mb_substr(strip_tags($article->description), 0, 200, 'UTF8') ?></p>
                </div>
            @endforeach
        </div>
        <div id="link">
            {{$articles->links()}}
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
