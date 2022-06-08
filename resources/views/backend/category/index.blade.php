<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Categories</h4>
            <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success my-alert" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header user">
                            <div class="card-title">الاقسام</div>
                            <a href='{{route('admin.category.create')}}' class="btn btn-primary">Add Category</a>
                        </div>
                        <div class="card-body">
                            <table class="table text-center table-head-bg-primary mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category -> title}}</td>
                                        <td>{{$category -> slug}}</td>
                                        <th scope="col">
                                            <a href='{{route('admin.category.edit',$category->id)}}' class="btn btn-warning">Edit</a>
                                            <button onclick="document.getElementById('category-delete-{{ $category->id }}').submit();" class="btn btn-danger">Delete</button>
                                            <form class="del btn btn-danger" id="category-delete-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href='{{route('mycate',$category->slug)}}' class="btn btn-info">Show</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @if ($categories->isEmpty() )
                                    <tr>
                                        <td colspan="3">There is no Category Until Now</td>
                                    </tr> 
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-4 mypagination">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>