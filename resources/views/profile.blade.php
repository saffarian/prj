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

            <div class="section__title text-center">
                <h2 class="title__line">ویرایش <span class="text-theme">پروفایل کاربری</span></h2>
                <p>لطفا در تغییرات توجه کنید. پس از اطمینان از صحت اطلاعات، اطلاعات را ثبت کنید.</p>
            </div>

            <div class="row">
                <div class="book__tour__wrap">
                   <form method="post" action="">
                       {{ csrf_field() }}

                       <div class="single__tour__box name">
                           <label>نام و نام خانوادگی:</label>
                           <input type="text" name="name" value="{{ $user->name }}" style="color: #0a0a0a" required autofocus>
                       </div>

                       <div class="single__tour__box name">
                           <label>شماره تلفن:</label>
                           <input type="tel" name="phone_number" value="{{ $user->phone_number }}" style="color: #0a0a0a" required autofocus>
                       </div>

                       <div class="single__tour__box name">
                           <label>ایمیل:</label>
                           <input type="email" name="email" value="{{ $user->email }}" style="color: #0a0a0a" required autofocus>
                       </div>

                       <div class="book__tour__btn mt-50 text-center">
                           <button class="rm__btn btn--transparent" type="submit" style="color: #ffb300">ثبت اطلاعات</button>
                       </div>

                   </form>

                </div>
            </div>

        </div>
    </section>
@endsection
@section('footer')

@endsection
@include('tour.template')
