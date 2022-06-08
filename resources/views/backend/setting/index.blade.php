<x-admin-layout>
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Settings</h4>
            <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success my-alert" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                <div class="col-md-12">
                    <div class="card col-12">
                        <div class="card-header user">
                            <div class="card-title">Setting</div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="card col-6">
                                    <div class="card-header">
                                        <div class="card-title">Home Page Setting</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <td>Site Name</td>
                                                    <td>Name</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Title</td>
                                                    <td>title</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>description</td>
                                                </tr>
                                                <tr>
                                                    <td>Logo</td>
                                                    <td>logo</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>phone</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>phone</td>
                                                </tr>
                                                <tr>
                                                    <td>About Us</td>
                                                    <td>abdout us</td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-default">Edit</button>
                                    </div>
                                </div>

                                <div class="card col-5">
                                    <div class="card-header">
                                        <div class="card-title">User Setting</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{Auth::user()->name}}</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Email Address</td>
                                                    <td>{{Auth::user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td>
                                                        @if (Auth::user()->isAdmin())
                                                            <span class="badge badge-success">Admin</span>
                                                        @else
                                                            <span class="badge badge-danger">User</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Photo</td>
                                                    <td >
                                                        @if ((Auth::user()->photo) == "A")
                                                            <img src="{{ asset('Dashboard/img/avatars/avatar.png')}}" alt="user" with="250" height="250">
                                                        @else
                                                            <img src="{{ asset('Dashboard/img/avatars/')}}/{{ Auth::user()->photo }}" alt="user" with="250" height="250">
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
                                    <div class="card-action">
                                        <a href='{{route('admin.users.edit',Auth::user()->id)}}' class="btn btn-default">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="card col-6">
                                    <div class="card-header">
                                        <div class="card-title">Social Media Setting</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <td>FaceBook</td>
                                                    <td>Name</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Yotube</td>
                                                    <td>title</td>
                                                </tr>
                                                <tr>
                                                    <td>Twitter</td>
                                                    <td>description</td>
                                                </tr>
                                                <tr>
                                                    <td>Instgram</td>
                                                    <td>logo</td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-default">Edit</button>
                                    </div>
                                </div>

                                <div class="card col-5">
                                    <div class="card-header">
                                        <div class="card-title">Menu Setting</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <td>FaceBook</td>
                                                    <td>Name</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Yotube</td>
                                                    <td>title</td>
                                                </tr>
                                                <tr>
                                                    <td>Twitter</td>
                                                    <td>description</td>
                                                </tr>
                                                <tr>
                                                    <td>Instgram</td>
                                                    <td>logo</td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-default">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>