<x-post-layout>

    <div class="content " dir="rtl">
        <div class="container-fluid">
            <form action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data"  class="card-body">
                @csrf

                <div class="form-group" dir='rtl'>
                    <textarea class="form-control tinymce" name='content' id="content" placeholder="المقالة">{{old('content')}}</textarea>
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
                        <div class="p-1">
                            <input type="text" class="form-control" name="schema[0][key]" value="{{ old('schema[0][key]')}}" id="schema" placeholder="Enter The Question"/>
                            <input type="text" class="form-control" name="schema[0][value]" value="{{ old('schema[0][value]') }}" id="schema" placeholder="Enter Answer"/>
                        </div>
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
                            <input type="text" class="form-control" name='title' value="{{old('title')}}" id="title" placeholder="Enter Title">
                            <small id="slugHelp" class="form-text text-muted">The Title shoude be less than 65 Letter</small>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name='description' id="description" placeholder="Enter Description">{{old('description')}}</textarea>
                            <small id="descriptionHelp" class="form-text text-muted">The Description shoude be less than 155 characters </small>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keywords">keywords</label>
                            <input type="text" class="form-control" name='keywords' value="{{old('keywords')}}" id="keywords" placeholder="Enter Keywords">
                            @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name='slug' value="{{old('slug')}}" id="slug" placeholder="Enter Slug">
                            <small id="slugHelp" class="form-text text-muted">The Slug shoude be small Letter && less than 50 Letter</small>
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telephone">telephone</label>
                            <input type="text" class="form-control" name='telephone' value="{{old('telephone')}}" id="telephone" placeholder="Enter telephone">
                            @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </section>
                    <section class="main-photo">
                        <div class="ml-2 col-sm-12" dir="ltr">
                            <input type="file" name="photo" value="{{old('photo')}}" class="file" >
                            <div class="input-group my-3">
                                <label for="photo">Add Main Page Photo</label>
                                <br/>
                            <input type="text" name='photo' value="{{old('photo')}}" class="form-control" disabled placeholder="Upload File" id="file">
                            <div class="input-group-append">
                            <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                        </div>
                        </div>
                        <div class="ml-2 col-sm-12">
                            <img src="" id="preview" class="img-thumbnail">
                        </div>

                    </section>
                </section>
                <div class="card-action">
                    <button class="btn btn-success">Add Page</button>
                    <a href="{{route('admin.page.index')}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
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
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        

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



