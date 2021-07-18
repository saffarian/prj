@section('container')
    <div class="container mt-40">
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
    </div>

    <section class="ptb-100 bg-white">
        <div class="container">
            <section class="book__the__tour ptb-100 bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="book__the__tour__container bg-7 ptb-100" data-black-overlay="8">
                                <div class="section__title text-center">
                                    <h2 class="title__line">رزرو <span class="text-theme">تور گردشگری</span></h2>
                                    <p>{{ $tour->title }}</p>
                                </div>
                                <form method="post" action="" id="main">
                                    {{ csrf_field() }}

                                    <div class="book__tour__wrap">
                                        <div class="single__tour__box name">
                                            <input type="text" name="first_name" placeholder="نام" required autofocus>
                                            <input type="text" name="last_name" placeholder="نام خانوادگی" required>
                                        </div>

                                        <div class="single__tour__box option--select">
                                            <select name="adult_number" required>
                                                <option value="1">بزرگسال - 1 نفر</option>
                                                <option value="2">بزرگسال - 2 نفر</option>
                                                <option value="3">بزرگسال - 3 نفر</option>
                                                <option value="4">بزرگسال - 4 نفر</option>
                                                <option value="5">بزرگسال - 5 نفر</option>
                                                <option value="6">بزرگسال - 6 نفر</option>
                                            </select>
                                            <select name="child_number" required>
                                                <option value="1">کودک - 1 نفر</option>
                                                <option value="2">کودک - 2 نفر</option>
                                                <option value="3">کودک - 3 نفر</option>
                                                <option value="4">کودک - 4 نفر</option>
                                                <option value="5">کودک - 5 نفر</option>
                                                <option value="6">کودک - 6 نفر</option>
                                            </select>
                                        </div>
                                        <div class="single__tour__box date--book">
                                            <input type="text" name="birth_date" placeholder="رزرو تاریخ" required>
                                        </div>
                                        <!-- End Single Bok -->
                                        <div class="book__tour__btn mt-50 text-center">
                                            <button class="rm__btn btn--transparent" type="submit">ثبت اطلاعات</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
@section('footer')

@endsection
@include('tour.template')
