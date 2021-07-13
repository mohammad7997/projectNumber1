<style>
    nav > ul > li {
        text-align: center;
    }

    #logout button {
        width: 60px !important;
    }
</style>
<header id="header">

    <div id="topbar">
        <div class="container">
            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="#intro" class="scrollto"><span class="yekan">یبمنیمنیبنم</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="front/img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul class="yekan fontn">
                <li class="active"><a class="yekan fontn" href="#intro">خانه</a></li>
                <li><a class="yekan fontn" href="{{route('articles')}}">مطالب</a></li>
                <li><a class="yekan fontn" href="#services">Services</a></li>
                <li><a class="yekan fontn" href="#portfolio">Portfolio</a></li>
                <li><a class="yekan fontn" href="#team">Team</a></li>
                <li class="drop-down"><a class="yekan fontn" href="">منوی کاربری</a>
                    <ul>
                        @auth
                            <li><a class="yekan fontn" href="{{route('editProfile',Auth::user()->id)}}">ویرایش پروفایل</a></li>
                            <li id="logout">
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger yekan fontn" type="submit">خروج</button>
                                </form>
                            </li>
                        @else
                            <li><a class="yekan fontn" href="{{route('register')}}">ثبت نام</a></li>
                            <li><a class="yekan fontn" href="{{route('login')}}">ورود</a></li>
                        @endauth
                    </ul>
                </li>
                <li><a href="#footer" class="yekan fontn">Contact Us</a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->