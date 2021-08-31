@extends('myLayout.app')

@section('content')
<div class="row">
    <div class="col-md-6 pffset-3">
        <div class="my-3 text-end">
            <a href="{{route('customer#list')}}"><button class="btn btn-secondary">List Page</button></a>
        </div>
        <div class="card">
            <div class="card-header text-center fs-3 bg-dark text-white">
                Customer Register Form
            </div>
            <div class="card-body">
                @if (Session::has('insertSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('insertSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{route('customer#create')}}" method="POST">
                    @csrf
                    <div class="my-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value='{{old('name')}}'>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="my-2">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value='{{old('email')}}'>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="my-2">
                        <label>Address</label>
                        <textarea name="address" cols="10" rows="3" class="form-control" >{{old('address')}}</textarea>
                        @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address')}}</p>
                        @endif
                    </div>

                    <div class="my-2">
                        <label>Gender</label>
                        <select name="gender" class="form-control" value='{{old('gender')}}'>
                            <option value="">Choose Option...</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="0">Other</option>
                        </select>
                        @if ($errors->has('gender'))
                            <p class="text-danger">{{ $errors->first('gender')}}</p>
                        @endif
                    </div>
                    <div class="my-2">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="dateOfBirth" value='{{old('dateOfBirth')}}'>
                        @if ($errors->has('dateOfBirth'))
                            <p class="text-danger">{{ $errors->first('dateOfBirth')}}</p>
                        @endif
                    </div>

                    <div class="my-2">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phoneNumber" value='{{old('phoneNumber')}}'>
                        @if ($errors->has('phoneNumber'))
                            <p class="text-danger">{{ $errors->first('phoneNumber')}}</p>
                        @endif
                    </div>
                    <div class="my-2 float-end">
                        <input type="submit" value="register" class="btn bg-dark text-white" name="register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
