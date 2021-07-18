@section('container')
    <section class="special__package ptb-100 bg-white">
        <div class="container" style="direction: rtl">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>انجام شد!</strong> {{ Session('success') }}
                </div>
            @endif

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <strong>خطا!</strong> {{ $error }}</div>
            @endforeach

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">تور <span class="text-theme">داخلی</span></h2>
                        <p>در اینجا می توانید تورهای داخلی را ببینید. در صورت انتخاب تور مورد نظر، بر روی آن کلیک
                            کنید.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="special__package__container clearfix mt-10">

                    @foreach($internalTours as $tour)
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="packages">
                                <div class="package__thumb">
                                    <img src="/templates/tour/images/special/1.jpg" alt="{{ $tour->title }}">
                                    <div class="packages__hover__info">
                                        <div class="package__hover__inner">
                                            <h4><a href="#">{{ $tour->title }}</a></h4>
                                            <p>{{ $tour->text }}</p>
                                            <div class="package--rating--btn">
                                                <div class="packages__btn">
                                                    <a class="view__btn" href="{{ $tour->url }}">ادامه مطلب</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="package__details">
                                    <div class="package__details__inner">
                                        @if($tour->expired)
                                            <p class="text-danger">زمان به پایان رسید</p>
                                        @elseif(!$tour->available)
                                            <p class="text-danger">تمام شد.</p>
                                        @else
                                            <p class="text-success">تور در دسترس</p>
                                            <p class="packg__prize">{{ number_format($tour->price) . ' تومان' }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>


    <section class="special__package ptb-100 bg-white">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">تور <span class="text-theme">خارجی</span></h2>
                        <p>در اینجا می توانید تورهای خارجی را ببینید. در صورت انتخاب تور مورد نظر، بر روی آن کلیک
                            کنید.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="special__package__container clearfix mt-10">

                    @foreach($externalTours as $tour)
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="packages">
                                <div class="package__thumb">
                                    <img src="/templates/tour/images/special/1.jpg" alt="{{ $tour->title }}">
                                    <div class="packages__hover__info">
                                        <div class="package__hover__inner">
                                            <h4><a href="#">{{ $tour->title }}</a></h4>
                                            <p>{{ $tour->text }}</p>
                                            <div class="package--rating--btn">
                                                <div class="packages__btn">
                                                    <a class="view__btn" href="{{ $tour->url }}">ادامه مطلب</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="package__details">
                                    <div class="package__details__inner">
                                        @if($tour->expired)
                                            <p class="text-danger">زمان به پایان رسید</p>
                                        @elseif(!$tour->available)
                                            <p class="text-danger">تمام شد.</p>
                                        @else
                                            <p class="text-success">تور در دسترس</p>
                                            <p class="packg__prize">{{ number_format($tour->price) . ' تومان' }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>
@endsection
@include('tour.template')
