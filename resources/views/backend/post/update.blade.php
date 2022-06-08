<?php if($post->schema != Null){$schema_num = count($post->schema); }else {$schema_num = 0;}?>
<x-post-layout>
<div class="content" dir="rtl">
    <div class="container-fluid">
        <h4 class="page-title">Posts</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Post</div>
                    </div>
                    <form action="{{route('admin.post.update',$post->id)}}" method="POST" class="card-body" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="form-group">
                            <textarea class="form-control tinymce" name='content' id="content" placeholder="Enter content">{{$post->content}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="schema">schema</label>
                            <div class="input_fields_wrap">
                                <button type="button" class="add_field_button btn btn-primary">Add More QUESTION</button>
                                @for ($i=0; $i <= $schema_num; $i++)                        
                                    <div class="p-2">
                                        <input type="text" class="form-control" name='schema[{{ $i }}][key]' value="{{$post->schema[$i]['key'] ?? ''}}" id="schema" placeholder="Enter schema"/>
                                        <input type="text" class="form-control" name='schema[{{ $i }}][value]' value="{{$post->schema[$i]['value'] ?? ''}}" id="schema" placeholder="Enter schema"/>
                                    </div>
                                @endfor
                            </div>
                            @error('schema')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <section class="form-content">
                            <section class="seo-form">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name='title' value="{{$post->title}}" id="title" placeholder="Enter Title">
                                    <small id="slugHelp" class="form-text text-muted">The Title shoude be less than 65 Letter</small>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name='description' id="description" placeholder="Enter Description">{{$post->description}}</textarea>
                                    <small id="descriptionHelp" class="form-text text-muted">The Description shoude be less than 155 characters </small>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords">keywords</label>
                                    <input type="text" class="form-control" name='keywords' value="{{$post->keywords}}" id="keywords" placeholder="Enter Keywords">
                                    @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name='slug' value="{{$post->slug}}" id="slug" placeholder="Enter Slug">
                                    <small id="slugHelp" class="form-text text-muted">The Slug shoude be small Letter && less than 50 Letter</small>
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>   

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id">
                                        @foreach ( $categories as $category)
                                            <option value="{{ $category ->id}}" {{ ($post ->category_id) == $category ->id ? 'selected' : '' }}>{{ $category ->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="writer_id">Writer</label>
                                    <select id="writer_id" name="writer_id">
                                        @foreach ( $users as $user)
                                            <option value="{{ $user ->id }}" {{ ($post ->writer_id) == $user ->id ? 'selected' : '' }}>{{ $user ->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('writer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="telephone">telephone</label>
                                    <input type="text" class="form-control" name='telephone' value="{{$post-> telephone}}" id="telephone" placeholder="Enter telephone">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="main-photo">
                                <div class="ml-2 col-sm-12" dir="ltr">
                                    <div id="msg"></div>
                                    <input type="file" name="photo" value="{{$post -> photo}}" class="file" accept="image/*">
                                    <div class="input-group my-3">
                                            <label for="photo">Add Main Post Photo</label>
                                            <br/>
                                        <input type="text" name='photo' value="{{$post -> photo}}" class="form-control" disabled placeholder="Upload File" id="file">
                                        <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 col-sm-12">
                                    <img src="{{ asset('images/posts')}}/{{$post -> photo}}" id="preview" class="img-thumbnail">
                                </div>
                            </section>
                        </section>

                        <div class="card-action">
                            <button class="btn btn-success">Update Post</button>
                            <a href="{{route('admin.post.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{ asset('Editor/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('Editor/js/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
<script>
    $(function(){
        $('textarea.tinymce').tinymce({
            height: 1600,
            language:'ar',
            directionality:'rtl',
            plugins:[
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table  directionality',
                'emoticons template paste  textpattern imagetools codesample toc help',
            ],
            contextmenu: " cut copy paste | link image inserttable | cell row column deletetable",
            toolbar1:'undo redo | fontsizeselect styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |ltr rtl | link media image codesample | charmap emoticons |preview | forecolor backcolor removeformat ',
            file_picker_callback (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'Laravel File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text })
                }
                })
            },
        });
    });

</script>

<script>
    $(document).ready(function() {
        $().n
        var max_fields      = 20; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x = {{$schema_num + 1}}; //initlal text box count
        

    $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed

                //text box increment
                $(wrapper).append('<div><input type="text" name="schema['+x+'][key]" value="{{ old("schema['+x+'][key]")}}" class="form-control" placeholder="Enter Question"/><input type="text" name="schema['+x+'][value]" value="{{ old("schema['+x+'][value]") }}" class="form-control" placeholder="Enter Answer"/><a href="#" class="remove_field"><i class="la la-minus-circle"></i></a></div>'); //add input box
                x++;
        }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
@endsection
</x-post-layout>


