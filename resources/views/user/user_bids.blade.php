@extends('user.userlayout')
@section('content')
<div class="row">
<div class="col-13 col-xl-20 mb-4 mb-lg-0">
    <div class="card">
        <h5 class="card-header">Bidd Details</h5>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($bids as $bid)
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">tender id</th>
                        <th scope="col">bid id</th>
                        <th scope="col">name</th>
                        <th scope="col">company name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                        <th scope="col">bid amount</th>
                        <th scope="col">quotation</th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr>

                        <td>{{$bid->tender_id}}</td>
                        <td>{{$bid->id}}</td>
                        <td>{{$bid->name}}</td>
                        <td>{{$bid->companyname}}</td>
                        <td>{{$bid->email}}</td>
                        <td>{{$bid->phone}}</td>
                        <td>{{$bid->address}}</td>
                        <td>{{$bid->bid_amount}}</td>

                        <td>
                            @if($bid->quotation)
                            <a href="{{ asset($bid->quotation) }}" target="_blank">View File</a>
                        @else
                            No File Uploaded
                        @endif
                        </td>

                        <td><a href="#" class="btn btn-danger">cancel</a></td>

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
