@extends('frontend.layouts.structure')
@section('content')
<main>
    <!--# Start The Content-->
        <!--# Start Post Content-->
        <section id='post-content'>
            <section class="py-5 space"></section>
            <section class="my-title">
                <h1>{{ $category->title}}</h1>
            </section>
            <section id='Categories-Page' class='py-5'>
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        @if ($posts->where('category_id', $category->id)->isEmpty() )
                                            <li class="list-group-item">There are no Posts in this Category Until Now</li>
                                        @endif
                                        @foreach ($posts->where('category_id', $category->id)  as $post)
                                            <li class="list-group-item">{{$post->title}}</li>
                                        @endforeach
                                    </ul>
                                </section>
                            </section>
                        </section>        
                    </section>
                </section>
            </section>
        </section>
        <!--# End Post Content-->
    <!--# End The Content-->
    </main>
@stop