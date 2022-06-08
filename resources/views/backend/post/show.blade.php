@extends('frontend.layouts.structure')
@section('content')
<main>
    <!--# Start The Content-->
        <!--# Start Post Content-->
        <section id='post-content'>
            <section class="py-5 space"></section>
            <section class="my-title">
                <h1></h1>
            </section>
            <section id='Categories-Page' class='py-5'>
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    @foreach($posts as $mypost)
                                        <h1>{{ $mypost->title}}</h1>
                                        @foreach ($mypost->schema as $property)
                                            <b>{{ $property['key'] }}</b>: {{ $property['value'] }}<br />
                                        @endforeach
                                    @endforeach
                                </section>
                            </section>
                        </section>

                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true" >An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
                                    </ul>
                                </section>
                            </section>
                        </section>

                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true" >An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
                                    </ul>
                                </section>
                            </section>
                        </section>

                        <section class="col">
                            <section class="card text-dark bg-light m-auto">
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true" >An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
                                    </ul>
                                </section>
                            </section>
                        </section>

                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true" >An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
                                    </ul>
                                </section>
                            </section>
                        </section>

                        <section class="col">
                            <section class="card text-dark bg-light m-auto" >
                                <section class="card-header text-center">Header</section>
                                <section class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true" >An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
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