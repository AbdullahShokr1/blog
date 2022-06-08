@extends('frontend.layouts.structure')
@section('content')
    <main>
        <!--# Start The Content-->
            <!--#2 Start Breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="#">المكتبة</a></li>
                <li class="breadcrumb-item active" aria-current="page">البيانات</li>
                </ol>
            </nav>
            <!--#2 End Breadcrumb-->
            <!--#2 Start Carousel-->
            <section id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <section class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </section>
                <section class="carousel-inner">
                <section class="carousel-item active">
                    <img src="{{ asset('images/background.webp')}}" class="my-carousel d-block w-100" alt="...">
                    <section class="layout"></section>
                    <section class="container">
                        <section class="carousel-caption">
                            <h1>عنوان مثال آخر.</h1>
                            <p>حسب المجلس الثقافي البريطاني فإن تعليم الإنجليزية داخل بريطانيا يسهم في تعزيز اقتصادها بما يتجاوز ملياري جنيه سنوياً، كما أنه وفر أكثر من 26 ألف وظيفة.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">أعرف أكثر</a></p>
                        </section>
                    </section>
                </section>
                <section class="carousel-item">
                    <img src="images/images (2).jpg" class="my-carousel d-block w-100" alt="...">
                    <section class="layout"></section>
                    <section class="container">
                        <section class="carousel-caption">
                            <h1>عنوان مثال آخر.</h1>
                            <p>حسب المجلس الثقافي البريطاني فإن تعليم الإنجليزية داخل بريطانيا يسهم في تعزيز اقتصادها بما يتجاوز ملياري جنيه سنوياً، كما أنه وفر أكثر من 26 ألف وظيفة.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">أعرف أكثر</a></p>
                        </section>
                    </section>
                </section>
                <section class="carousel-item">
                    <img src="images/images (4).jpg" class="my-carousel d-block w-100" alt="...">
                    <section class="layout"></section>
                    <section class="container">
                        <section class="carousel-caption">
                            <h1>عنوان مثال آخر.</h1>
                            <p>حسب المجلس الثقافي البريطاني فإن تعليم الإنجليزية داخل بريطانيا يسهم في تعزيز اقتصادها بما يتجاوز ملياري جنيه سنوياً، كما أنه وفر أكثر من 26 ألف وظيفة.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">أعرف أكثر</a></p>
                        </section>
                    </section>
                </section>
                </section>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">السابق</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">التالي</span>
                </button>
            </section>
            <!--#2 End Carousel-->
            <!--#4 Start Categories-->
            <section id="Categories" class="container marketing">
                <!-- Three columns of text below the carousel -->
                <section class="col-lg-6 col-md-8 mx-auto text-center py-4">
                    <h1 class="fw-light">الاقسام</h1>
                </section>
                <section class="row my-4">
                    @foreach ( $categories as $category )
                        <section class="col-md-3 text-center my-3">
                            <img class="catego-img rounded-circle" src="{{$category->image}}" alt="{{$category->title}}">
                            <h2><a href="{{route('mycate',$category->slug)}}">{{$category->title}}</a></h2>
                        </section><!-- /.col-lg-3 -->
                    @endforeach
                </section><!-- /.row -->
            </section>
            <!--#4 End Categories-->
            <!--#5 Start Best Posts-->
            <section id='Best-Posts'>
                <section class="album py-5 bg-light">
                    <section class="py-2 text-center container">
                        <section class="row py-lg-5">
                        <section class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light">مثال الألبوم</h1>
                            <p class="lead text-muted">وصف قصير حول الألبوم أدناه . </p>
                        </section>
                        </section>
                    </section>
                    <section class="container">
                        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                            @foreach ($best_posts as $best)
                                <section class="col">
                                    <section class="card cardd shadow-sm">
                                        <img src="{{asset('images/posts/'.$best->photo)}}" class="my-carousel d-block w-100" alt="{{$best->title}}">
                                        <section class="card-body">
                                        <h3>{{$best->title}}</h3>
                                        <p class="card-text">{{\Illuminate\Support\Str::limit($best->description, 60, '.....')}}</p>
                                        <section class="d-flex justify-content-between align-items-center">
                                            <section class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">عرض المقالة</button>
                                            </section>
                                            <small class="text-muted">{{$best->updated_at->diffForHumans()}}</small>
                                        </section>
                                        </section>
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
            <!--#5 End Best Posts-->
            <!--#3 Start Info-->
            <section id="Info" class="px-4 py-5 text-center">
                <section class="container d-flex justify-content-cente ">
                    <img class="info-img d-block mx-auto" src="images/logo.png" alt="" width="72" height="57">
                </section>
                <h1 class="display-5 fw-bold">من نحن</h1>
                <section class="col-lg-6 mx-auto">
                <p class="lead mb-4"> وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.</p>
                <section class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3 text-center">معرفة المزيد</button>
                </section>
                </section>
            </section>
            <!--#3 End Info-->
            <!--#6 Start Last Posts-->
            <section id='Last-Posts'>
                <section class="album py-5 bg-light">
                    <section class="py-2 text-center container">
                        <section class="row py-lg-5">
                        <section class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light">أحدث المقالات</h1>
                        </section>
                        </section>
                    </section>
                    <section class="container">
                
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ( $posts as $post)
                            <section class="col">
                                <section class="card shadow-sm">
                                    <img src="{{asset('images/posts/'.$post->photo)}}" class="my-carousel d-block w-100" alt="{{$post->title}}">
                                    <section class="layout"></section>
                                    <h2><a href="#">{{$post->title}}</a></h2>
                                </section>
                            </section> 
                        @endforeach                       
                    </section>
                    </section>
                </section>
            </section>
            <!--#6 End Last Posts-->
        <!--# End The Content-->
    </main>
@stop