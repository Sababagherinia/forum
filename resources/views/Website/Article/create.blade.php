@extends("Website.app")

@section('main')

    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <form action="{{ route("website.article.store") }}" method="post">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    افزودن تاپیک
                                </h5>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title" class=" col-form-label">تیتر</label>
                                            <input class="form-control" type="text" value="{{ old('title') }}" name="title"
                                                   id="title" placeholder="تیتر">
                                        </div>
                                    </div>



                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="body" class=" col-form-label">متن</label>
                                            <textarea class="form-control  " name="body" id="body">{{ old('body') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">افزودن</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection


