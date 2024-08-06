@extends('admin.adminlayout')
@section('content')

<div class="col-12 col-xl-20 mb-4 mb-lg-0">
    <div class="card">
        <h5 class="card-header">User Details</h5>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($users as $user)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">user id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone No</th>
                        <th scope="col">address</th>
                        <th scope="col">usertype</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->usertype}}</td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                      </tr>

                    </tbody>
                  </table>
                  @endforeach
            </div>
            <a href="#" class="btn btn-block btn-light">View all</a>
        </div>
    </div>
</div>

@endsection
