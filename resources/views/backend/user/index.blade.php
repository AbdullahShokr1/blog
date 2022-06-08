<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Users</h4>
            <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success my-alert" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header user">
                            <div class="card-title">المستخدمين و الادمن</div>
                            <a href='{{route('admin.users.create')}}' class="btn btn-primary">Add User</a>
                        </div>
                        <div class="card-body">
                            <table class="table text-center table-head-bg-primary mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="profile-pic img-circle">
                                            @if (($user -> photo) == "A")
                                                <img src='{{asset('Dashboard/img/avatars/avatar.png')}}' alt="user-img" width="36" class="img-circle">
                                            @else
                                                <img src='{{asset('Dashboard/img/avatars/'.$user -> photo)}}' alt="user-img" width="36" class="img-circle">
                                            @endif
                                        </td>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>
                                            @if ($user->isAdmin())
                                                <span class="badge badge-success">Admin</span>
                                            @else
                                                <span class="badge badge-danger">User</span>
                                            @endif
                                        </td>
                                        <th scope="col">
                                            <a href='{{route('admin.users.edit',$user->id)}}' class="btn btn-warning">Edit</a>
                                            <form class="del btn btn-danger" action="{{ route('admin.users.destroy',$user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href='' class="btn btn-info">Show</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>