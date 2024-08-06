{{-- @extends('frontend.navbar') --}}
@section('content')

    {{-- <style>
        form {
            /* margin-top: 10%; */
            /* margin-left: 20%; */
            background-color: #add4fb;
            align-content: center;
            padding: 30px;
            border-radius: 30px;
            margin:100px 100px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            left: 200px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            /* Border color */
            padding: 10px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            /* Button color */
            border-color: #007bff;
            margin-left: 200px;
            font-size: 1rem;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Darker button color on hover */
            border-color: #0056b3;
        }

        .alert {
            margin-bottom: 1.5rem;
            padding: 10px;
            border-radius: 10px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
    </style> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}"> --}}
    <style>


        form {
            background-color: #add4fb;
            padding: 30px;
            border-radius: 30px;
            width: 100%;
            margin-top: 8%;
            margin-bottom: 4%;



        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1rem;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            color: white;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-bottom: 1.5rem;
            padding: 10px;
            border-radius: 10px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
    </style>


<body>

    <div class="container">
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('bidpost', ['id' => $tenderId]) }}" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="biddername">Bidder Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="companyname">Company Name</label>
                    <input type="text" class="form-control" name="companyname" placeholder="Company Name" value="{{ old('companyname') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{$data->email}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone no" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address" value="{{ old('address') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bid_amount">Bid Amount</label>
                    <input type="text" class="form-control" name="bid_amount" placeholder="Bid Amount" value="{{ old('bid_amount') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="quotation">Add Quotation</label>
                    <input type="file" class="form-control" name="quotation" value="{{ old('quotation') }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>
{{-- @endsection --}}
