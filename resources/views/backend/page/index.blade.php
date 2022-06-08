<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Pages</h4>
            <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success my-alert" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header user">
                            <div class="card-title">الصفحات</div>
                            <a href='{{route('admin.page.create')}}' class="btn btn-primary">Add Page</a>
                        </div>
                        <div class="card-body">
                            <table class="table text-center table-head-bg-primary mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody dir="rtl">
                                    @foreach ($pages as $page)
                                    <tr>
                                        <td>{{$page -> title}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($page -> description, 60, '.....')}}</td>
                                        <th>{{$page -> slug}}</th>
                                        <th >
                                            <a href='{{route('admin.page.edit',$page->id)}}' class="btn btn-warning">Edit</a>
                                            <button onclick="document.getElementById('page-delete-{{ $page->id }}').submit();" class="btn btn-danger">Delete</button>
                                            <form class="del btn btn-danger" id="page-delete-{{ $page->id }}" action="{{ route('admin.page.destroy',$page->id) }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href='{{route('admin.page.show',$page->id)}}' class="btn btn-info">Show</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @if ($pages->isEmpty() )
                                    <tr>
                                        <td colspan="5">There are no pages Until Now</td>
                                    </tr> 
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-4 mypagination">
                                {{-- {{ $categories->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>