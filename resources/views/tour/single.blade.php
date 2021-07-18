@section('container')
    <div class="container mt-40">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <strong>انجام شد!</strong> {{ Session('success') }}
            </div>
        @endif

        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>خطا!</strong> {{ $error }}</div>
        @endforeach
    </div>

    <section class="ptb-100 bg-white">
        <div class="container">
            <div class="row">

                <div class="mb-40 text-left" style="direction: rtl">
                    @guest('web')
                        <div>
                            <span class="text-danger">برای رزرو وارد شوید.</span>
                        </div>
                    @endguest
                    @auth('web')
                        @if($tour->available && !$tour->expired)
                            <div class="single__option">
                                <a class="btn__search" href="{{ route('reserve', ['id' => $tour->id]) }}">رزرو این تور</a>
                            </div>

                        @elseif($tour->expired)
                            <div>
                                <span class="text-danger">مهلت پایان یافت.</span>
                            </div>
                        @else
                            <div>
                                <span class="text-danger">اتمام ظرفیت</span>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="package__off">
                        <h2>تور<span class="text-theme">{{ $tour->title }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="row text-right mb-40">
                {{ $tour->text }}
                <hr />
                <div>
                    <span>رزرو شده: </span><strong>{{ \App\Models\Reserve::where('tour_id', $tour->id)->count() }} عدد</strong>
                </div>

                <div>
                    <span>ظرفیت باقیمانده: </span><strong>{{ $tour->number - \App\Models\Reserve::where('tour_id', $tour->id)->count() }} عدد</strong>
                </div>

            </div>


            <div class="row">
                @if(count($tour->descriptions))
                    <div class="section__title text-center">
                        <h2 class="title__line">سایز جزئیات تور <span class="text-theme">{{ $tour->title }}</span></h2>
                        <p>{{ $tour->description }}</p>
                    </div>
                    <ul class="text-right mt-20" style="direction: rtl">
                        @foreach($tour->descriptions as $description)
                            <li><i class="zmdi zmdi-check text-primary"
                                   style="margin-left: 5px"></i>{{ $description->text }}</li>
                        @endforeach
                    </ul>

                @endif
            </div>

            <div class="row mt-40">
                <div class="section__title text-center">
                    <h2 class="title__line">مدارک لازم جت رزرو <span class="text-theme">{{ $tour->title }}</span></h2>
                    <p>لطفا قبل از رزرو تور، مدارک زیر همراه شما باشد.</p>
                </div>
                <ul class="text-right mt-20" style="direction: rtl">
                    @if($tour->type == 'external')
                        <li><i class="zmdi zmdi-check text-primary" style="margin-left: 5px"></i>گذرنامه (پاسپورت)</li>
                    @endif
                    <li><i class="zmdi zmdi-check text-primary" style="margin-left: 5px"></i>کارت ملی</li>
                </ul>
            </div>

        </div>
    </section>
@endsection
@section('footer')

@endsection
@include('tour.template')
