<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Posts</h4>
            <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success my-alert" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header user">
                            <div class="card-title">المقالات</div>
                            <a href='{{route('admin.post.create')}}' class="btn btn-primary">Add Post</a>
                        </div>
                        <div class="card-body">
                            <table class="table text-center table-head-bg-primary mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Rent</th>
                                        <th scope="col">Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody dir="rtl">
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post -> title}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($post -> description, 60, '.....')}}</td>
                                        @foreach($categories->where('id', $post->category_id) as $category)
                                            <th>{{$category->title}}</th>
                                        @endforeach
                                        <th>{{$post -> telephone}}</th>
                                        <td>
                                            <input type="checkbox" checked="" name="" value="" data-toggle="toggle" data-onstyle="success">     
                                        </td>
                                        <th >
                                            <a href='{{route('admin.post.edit',$post->id)}}' class="btn btn-warning">Edit</a>
                                            <button onclick="document.getElementById('post-delete-{{ $post->id }}').submit();" class="btn btn-danger">Delete</button>
                                            <form class="del btn btn-danger" id="post-delete-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href='{{route('admin.post.show',$post->id)}}' class="btn btn-info">Show</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @if ($posts->isEmpty() )
                                    <tr>
                                        <td colspan="6">There are no Posts Until Now</td>
                                    </tr> 
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-4 mypagination">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>