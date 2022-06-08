<x-admin-layout>
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Categories</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Category</div>
                    </div>
                    <form action="{{route('admin.category.update',$category->id)}}" method="POST" class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name='title' value="{{$category->title}}" id="title" placeholder="Enter Title">
                            <small id="titleHelp" class="form-text text-muted">The Slug shoude be less than 65 Letter</small>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="description" class="form-control" name='description' value="{{$category->description}}" id="description" placeholder="Enter Description">
                            <small id="slugHelp" class="form-text text-muted">The Description shoude be less than 155 Letter</small>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name='slug' value="{{$category->slug}}" id="slug" placeholder="Enter Slug">
                            <small id="slugHelp" class="form-text text-muted">The Slug shoude be small Letter && less than 50 Letter</small>
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <input type="text" id="image_label" class="form-control" name="image"
                                   aria-label="Image" aria-describedby="button-image" value="{{$category->image}}" placeholder="Image">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                            </div>
                        </div>

                        <div class="card-action">
                            <button class="btn btn-success">Update Category</button>
                            <a href="{{route('admin.category.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });
    });

    // set file link
    function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
    }
</script>
@endsection
</x-admin-layout>


