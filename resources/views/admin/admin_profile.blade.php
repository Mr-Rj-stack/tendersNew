@extends('admin.adminlayout')
@section('content')




@if(count($errors)>0)
<div class="alert alert-danger">

    @foreach ($errors->all() as $error)
      <div class="alert alert-danger"><strong>{{$error}}</strong></div>

    @endforeach

</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">
  <strong>{{Session::get('success')}}</strong>
</div>
@endif
@if (Session::get('fail'))
    <div class="alert alert-danger">
      <strong>{{Session::get('fail')}}</strong>
    </div>
    @endif




<div class="container mb-4" style="border-bottom: .5px solid gray;">
  <h2>Profile</h2>
  <div class="row">
    <div class="m-auto">
      <form enctype="multipart/form-data" method="POST" action="">
        @csrf

        <div class="mb-3 mt-4 text-center">
          <img src="" id="ShowImg" alt="profile" class="rounded-circle"  width="200" height="200" onerror="">
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label"></label>
          <input class="form-control" type="file" id="InpImg"  name="image" style="width:350px">
        </div>
          <button type="submit" class="btn btn-dark mb-3 mt-3"><i class="bi bi-image"></i>Upload image</button>
        <a href="" class="btn btn-danger">Remove Profile</a>

        </form>
    </div>




  </div>
</div>



<div class="container mb-4" style="border-bottom: .5px solid gray;">
    <h2>Personal Details</h2>
    <div class="row">
      <div class="col-sm-8">
        <form method="POST" action="">
          @csrf
            <div class="form-floating mb-3 mt-4">
                <input type="name" class="form-control" id="floatingInput" name="username" value="">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput" name="address" value="">
                <label for="floatingInput">Address</label>
              </div>
              <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput" name="phone_number" value="">
                <label for="floatingInput">Phone Number</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" value="" readonly>
                <label for="floatingInput">Email address</label>
              </div>
            <button type="submit" class="btn btn-dark mb-3 mt-3">Save Changes</button>
          </form>
      </div>

    </div>
  </div>
  <div class="container mb-4" style="border-bottom: .5px solid gray; ">
    <h2>Change Password</h2>
    <div class="row">
      <div class="col-sm-8">
        <form method="POST" action="">
          @csrf
            <div class="form-floating mb-4 mt-4">
                <input type="password" class="form-control" name="current_password" id="floatingInput"  placeholder="Password">
                <label for="floatingPassword">Current Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Password">
                <label for="floatingPassword">New Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" id="floatingInput" placeholder="Password">
                <label for="floatingPassword">Confirm Password</label>
              </div>
            <button type="submit" class="btn btn-dark mb-3 mt-3">Save Changes</button>
          </form>
      </div>

    </div>
  </div>

  <div class="container">
    <h2>Delete Account</h2>
    <p class="h6">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
    <div class="row">
      <div class="col-sm-8">
        <form action="" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
        <button onclick="return confirm('Are you sure want to delete this account? ')" class="btn btn-danger mb-3 mt-3"><i class="bi bi-trash"></i>Delete Account</button>
      </form>
      </div>

    </div>
  </div>

  <script type="text/javascript">

  InpImg.onchange= evt=>
  {
    const[file]=InpImg.files
    if(file){
      ShowImg.src=URL.createObjectURL(file)
    }
  }

  </script>
@endsection
