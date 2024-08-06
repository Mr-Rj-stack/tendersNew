@extends('frontend.navbar')
@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row gy-4">
            @foreach ($tenders as $tender)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <h5 class="card-title" style="text-align: center">{{ $tender->type }}</h5>
                        <div class="card-body">
                            <p class="card-title">{{ $tender->discription }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{ $tender->enddate }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-title"><a href="{{ asset($tender->file) }}" style="color: blue" target="_blank">View File</a></p>
                        </div>
                        <div class="card-body">
                            @if($data->id!=$tender->user_id)
                            <a href="{{ route('makebid',['id' => $tender->id]) }}" class="btn btn-dark">Start Bid</a>
                            @endif
                            <a href="" class="btn btn-danger">See More</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
