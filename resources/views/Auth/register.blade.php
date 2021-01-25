@extends('Website.app')
@section('title' , '')


@section('main')



    <div class="section section-p-1 h-100 d-flex align-items-center   pt-5   pb-5 animated-background-container section-balls">
        <div class="animated-background"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4  ">


                    <div class="section-detail-container pt-5">
                        <div class="card-heading text-center">
                            <h3 class="card-title">ثبت نام</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-label-group">
                                    <input class="form-control" placeholder="نام کامل" type="text" name="name" id="name" value="{{ old('name') }}">
                                    <label for="name">نام کامل</label>
                                </div>
                                <div class="form-label-group">
                                    <input class="form-control" placeholder="نام کاربری" type="text" name="username" id="username" value="{{ old('username') }}">
                                    <label for="username">نام کاربری</label>
                                </div>

                                <div class="form-label-group">
                                    <input class="form-control" placeholder="کلمه عبور" type="password" name="password" id="password" value="{{ old('password') }}">
                                    <label for="password">کلمه عبور</label>
                                </div>
                                <div class="form-label-group">
                                    <input class="form-control" placeholder="تکرار کلمه عبور" type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                                    <label for="password_confirmation">تکرار کلمه عبور</label>
                                </div>
                                <div class="form-group">


                                    <button type="submit"  class="btn-custom-1 btn">
                                        ثبت نام
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>


                    <div class="mt-5 text-decoration-none">
                        <a href="{{ route('login') }}" class="btn-custom-5">
                           <span class="title">
                               ورود
                           </span>
                            <span class="hover-icon">
                                <i class="fas fa-chevron-left item-icon"></i>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
