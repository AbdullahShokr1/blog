<x-admin-layout>
<div class="content">
    <div class="container-fluid">
        <h4 class="page-title">Users</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New User</div>
                    </div>
                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name='name' value="{{old('name')}}" id="name" placeholder="Enter Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name='email' value="{{old('email')}}" id="email" placeholder="Enter Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name='password' id="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <label>Role</label><br/>
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="is_admin" value="0"  checked="">
                                <span class="form-radio-sign">User</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio" name="is_admin" value="1">
                                <span class="form-radio-sign">Admin</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="photo">Add Your Photo</label>
                            <input type="file" name='photo' class="form-control-file" id="photo">
                            @error('photo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Add User</button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>


