@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Edit Profile
                  <a class="btn btn-success float-sm-right" href="{{ route('profile.view') }}"><i class="fa fa-list"></i>Your Profile</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="email">Mobile No</label>
              <input type="text" class="form-control" name="mobile" id="email" aria-describedby="emailHelp" value="{{ $user->mobile }}">
            </div>            
            <div class="form-group">
              <label for="exampleInputPassword1">Gender</label>
              <select class="form-control" name="gender">
                <option value="">Select Gender</option>
                <option value="Male"{{ ($user->gender=="Male")? "selected":"" }}>Male</option>
                <option value="Female"{{ ($user->gender=="Female")? "selected":"" }}>Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="profile_image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" >
            </div>                
            <div class="form-group">
             <div class="row">
                <div class="col-md-4">
                  <img id="showImage" src="{{ (!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/no_image.png') }}" style="width: 150px;height: 160px; border:1px solid #000;">
                </div>
                </div>
              </div>            
           <button type="submit" class="btn btn-primary">update</button>
          </form>
      </div>
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection