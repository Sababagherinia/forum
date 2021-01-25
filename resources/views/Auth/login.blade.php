@extends('Website.app')


@section('main')



    <div class="section section-p-1 h-100 d-flex align-items-center pt-5  pb-5  animated-background-container section-balls">
        <div class="animated-background"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4  ">


                        <div class="section-detail-container pt-5">
                            <div class="card-heading text-center">
                                <h3 class="card-title">ورود</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="post">
                                    <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">
                                    @csrf
                                    <div class="form-label-group">
                                        <input class="form-control" type="text" name="user_field" id="user_field" placeholder="نام کاربری و یا موبایل" value="{{ old('user_field') }}">
                                        <label for="user_field">نام کاربری و یا موبایل</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input class="form-control" type="password" placeholder="کلمه عبور" name="password" id="password" value="{{ old('password') }}">
                                        <label for="password">کلمه عبور</label>
                                    </div>
                                    <div class="form-group">


                                        <button type="submit"  class="btn-custom-1 btn">
                                           <span class="title">
                                                <i class="fas fa-sign-in-alt"></i>
                                               ورود
                                           </span>

                                            <span class="hover-icon">
                                                <i class="fas fa-chevron-left item-icon"></i>
                                            </span>
                                        </button>

                                    </div>


                                </form>
                            </div>


                        </div>

                        <div class="mt-5 text-decoration-none">
                            <a href="{{ route('register') }}" class="btn-custom-5">
                                ثبت نام
                            </a>


                        </div>

                    </div>
                </div>
            </div>


    </div>


@endsection

@section('js')
@endsection