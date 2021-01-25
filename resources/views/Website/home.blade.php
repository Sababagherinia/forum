@extends("Website.app")


@section("main")


   <section class="mt-5 pb-5 mb-5">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-7">
                   @foreach($articles as $article)

                       <div class="card mb-3">
                           <div class="card-body">
                               <h5 class="card-title">
                                   <div class="row justify-content-between">
                                       <div class="col-auto">
                                           <a href="{{ $article->hrefUrl }}">
                                               {!! str_limit($article->title, 20,  '...')  !!}
                                           </a>
                                       </div>
                                       <div class="col-auto">
                                           @if(auth()->check() && $article->user->id == auth()->user()->id)
                                               <div>
                                                   <a class="btn btn-info" href="{{ route("website.article.edit" , ['article' => $article->slug]) }}">
                                                       ویرایش
                                                   </a>

                                               </div>

                                               <form method="post" class="mt-2" action="{{ route("website.article.destroy"  , ['article' => $article->slug] ) }}">
                                                   @csrf
                                                   @method("DELETE")
                                                   <button class="btn btn-danger">
                                                       حذف
                                                   </button>
                                               </form>
                                           @endif
                                       </div>
                                   </div>


                               </h5>
                               <h6 class="card-subtitle mb-2 text-muted">{{ $article->user->name }}</h6>
                               <p class="card-text">
                                   {!! str_limit($article->body, 150,  '...')  !!}
                               </p>
                               <a href="{{ $article->hrefUrl }}" class="card-link">نمایش بیشتر</a>
                           </div>
                       </div>


                   @endforeach
               </div>
           </div>
       </div>
   </section>


@endsection
