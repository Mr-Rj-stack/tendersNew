@extends('user.userlayout')
@section('content')
<div class="row">
<div class="col-13 col-xl-20 mb-4 mb-lg-0">
    <div class="card">
        <h5 class="card-header">Tender Details</h5>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($tenders as $tender)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">tender id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                        <th scope="col">tender type</th>
                        <th scope="col">discription</th>
                        <th scope="col">file</th>
                        <th scope="col">start date</th>
                        <th scope="col">end date</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>

                        <td>{{$tender->id}}</td>
                        <td>{{$tender->name}}</td>
                        <td>{{$tender->email}}</td>
                        <td>{{$tender->phone}}</td>
                        <td>{{$tender->address}}</td>
                        <td>{{$tender->type}}</td>
                        <td>{{$tender->discription}}</td>
                        <td>
                            @if($tender->file)
                            <a href="{{ asset($tender->file) }}" target="_blank">View File</a>
                        @else
                            No File Uploaded
                        @endif
                        </td>
                        <td>{{$tender->startdate}}</td>
                        <td>{{$tender->enddate}}</td>
                        <td><a href="#" class="btn btn-danger">cancel</a></td>
                        <td><a href="{{ route('user_bids',['id' => $tender->id]) }}" class="btn btn-danger">viewbid</a></td>
                      </tr>

                    </tbody>
                  </table>
                  @endforeach
            </div>
            <a href="#" class="btn btn-block btn-light">View all</a>
        </div>
    </div>
</div>
</div>
@endsection
