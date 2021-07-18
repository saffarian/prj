<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $page['title'] }}</title>
    <link rel="stylesheet" href="/templates/tour/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/tour/css/core.css">
    <link rel="stylesheet" href="/templates/tour/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="/templates/tour/style.css">
    <link rel="stylesheet" href="/templates/tour/css/responsive.css">
    <link rel="stylesheet" href="/templates/tour/css/custom.css">
    <script src="/templates/tour/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<div class="wrapper fixed-newslatter">
    <header id="header" class="header">
        <div id="sticky-header-with-topbar" class="container-fluid hidden-xs sticky__header">
            <div class="row">
                <div class="col-12">
                    <div class="header__top">
                        <div class="header__top__left">
                            <ul class="login__regester">
                                @guest('web')
                                    <li><a class="modal-view button" href="#" data-toggle="modal"
                                           data-target="#loginform">لاگین<i
                                                class="zmdi zmdi-account"></i></a></li>
                                    <li><a class="modal-view button" href="#" data-toggle="modal"
                                           data-target="#registrationform">ثبت نام<i class="zmdi zmdi-account-add"></i></a>
                                    </li>
                                @else
                                    <li><a class="modal-view button" href="{{ Route('profile') }}">پروفایل<i
                                                class="zmdi zmdi-account"></i></a></li>

                                    <li><a class="modal-view button" href="{{ Route('logout') }}">خروج<i
                                                class="zmdi zmdi-power-off"></i></a></li>
                                @endguest
                            </ul>
                        </div>
                        <div class="header__top__right">
                            <p><span class="text-theme">تماس:</span>09111234567</p>
                            <p class="hidden-sm"><span class="text-theme">ساعات کاری:</span>شنبه تا چهارشنبه 9 تا 17 -
                                پنجشنبه و جمعه تعطیل</p>
                            <p><span class="text-white"><a href="{{ Route('homepage') }}">صفحه خانه</a> </span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="slider__container slider__full--screen slider__position--relative">
        <div class="slide @switch (rand(1, 4))
        @case(1) slider__bg--1
        @break
        @case(2) slider__bg--2
          @break
        @case(3) slider__bg--3
          @break
        @case(4) slider__bg--4
          @break
        @endswitch
            htc__slider__animation--center" data-black-overlay="6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="slide__align--center">
                            <div class="slider__inner">
                                <h2 class="wow">تور ویژه خودتان را بیابید</h2>
                                <h1 class="wow">با کمک گروه گردشگری ما</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @yield('container')

    <footer class="footer__area bg-4">
        <div class="copyright__arera" data-black-overlay="9">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="copyright__inner">
                            <div class="copyright__text">
                                <p>تمامی حقوق این وب سایت محفوظ است.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<div id="login__form__wrap">
    <div class="modal fade" id="loginform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                </div>
                <div class="modal-body">
                    <div class="form-pop-up-content">
                        <div class="text-center">
                            <h2 class="modal-title">لاگین</h2>
                        </div>
                        <form method="post" action="{{ Route('homepage') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="action" value="login"/>
                            <div class="form-box">
                                <input type="text" name="username" placeholder="نام کاربری (ایمیل یا شماره همراه)">
                                <input type="password" name="password" placeholder="کلمه عبور">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-uppercase login__btn">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="register__form__wrap">
    <!-- Modal -->
    <div class="modal fade" id="registrationform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                </div>
                <div class="modal-body">
                    <div class="form-pop-up-content">
                        <div class="area-title text-center">
                            <h2>ثبت نام</h2>
                        </div>
                        <form method="post" action="{{ Route('homepage') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="action" value="register"/>

                            <div class="form-box">
                                <input type="text" name="name" placeholder="نام">
                                <input type="text" name="email" placeholder="ایمیل">
                                <input type="tel" name="phone_number" placeholder="شماره تلفن">
                                <input type="password" name="password" placeholder="کلمه عبور">
                                <input type="password" name="password_confirmation" placeholder="تکرار کلمه عبور">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-uppercase register__btn">ثبت نام</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/templates/tour/js/vendor/jquery-1.12.0.min.js"></script>
<script src="/templates/tour/js/bootstrap.min.js"></script>
<script src="/templates/tour/js/plugins.js"></script>
<script src="./templates/tour/js/slick.min.js"></script>
<script src="/templates/tour/js/waypoints.min.js"></script>
@yield('footer')

</body>

</html>
