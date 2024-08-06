@extends('frontend.navbar')
@section('content')


        {{-- <style>
            form {
                /* margin-top: 10%; */
                /* margin-left: 20%; */
                background-color: #add4fb;
                align-content: center;
                padding: 30px;
                margin:100px 100px;
                border-radius: 30px;
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
                border-radius: 4px;
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
            .form-control-dropdown{
                border-radius: 10px;
                border: 1px solid #ced4da;
                font-size: 1rem;
                width: 100%;
                padding: 10px;
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

    <div class="container" style="margin-top: 10%">
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
        <form action="{{ route('tenderpost', [$data->id]) }}" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name"
                        value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email"
                        value="{{$data->email}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone no"
                        value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address"
                        value="{{ old('address') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tendertype">Tender Type</label>
                    <select id="tendertype" class="form-control-dropdown" name="type">
                        <option value="" disabled selected>Type of your call</option>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>

                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="discription">Discription</label>
                    <textarea class="form-control" name="discription" rows="3" placeholder="add details"
                        value="{{ old('discription') }}"></textarea>
                </div>
                <div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="file">Add File</label>
                            <input type="file" class="form-control" name="file" value="{{ old('file') }}">
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="startdate">Start Date</label>
                    <input type="date" class="form-control" name="startdate" id="startdate" placeholder="To"
                        value="{{ old('startdate') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="enddate">End Date</label>
                    <input type="date" class="form-control" name="enddate" id="enddate" placeholder="From"
                        value="{{ old('enddate') }}">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {

            const today = new Date().toISOString().split('T')[0];
            document.getElementById('startdate').setAttribute('min', today);
            document.getElementById('enddate').setAttribute('min', today);
        });
    </script>
@endsection
