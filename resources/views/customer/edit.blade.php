@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-3">

        <div class="card ">
            <div class="card-header fs-3 text-center bg-dark text-white">
                Customer Data
            </div>
            <form action=" {{ route('customer#update' , $customer->customer_id)}} " method="POST">
                @csrf
                <div class="card-body fs-4 ms-5 ps-5">

                    <div class="my-3">
                        <label>Name : </label>
                        <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="my-3">
                        <label>Email : </label>
                        <input type="email" name="email" class="form-control" value="{{ $customer->email }} ">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="my-3">
                        <label>Address : </label>
                        <textarea name="address" cols="10" rows="3" class="form-control">{{ $customer->address }}</textarea>
                        @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address')}}</p>
                        @endif
                    </div>
                    <div class="my-3">
                        <label>Gender : </label>
                        <select name="gender" class="form-control">
                            @if ($customer->gender == 1)
                            <option value="empty">Choose Option...</option>
                            <option value="1" selected>Male</option>
                            <option value="2">Female</option>
                            <option value="0">Other</option>
                            @elseif ($customer->gender == 2)
                            <option value="empty">Choose Option...</option>
                            <option value="1">Male</option>
                            <option value="2" selected>Female</option>
                            <option value="0">Other</option>
                            @elseif ($customer->gender == 0)
                            <option value="empty">Choose Option...</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="0" selected>Other</option>
                            @else
                            <option value="empty" selected>Choose Option...</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="0">Other</option>
                            @endif
                        </select>
                        @if ($errors->has('gender'))
                            <p class="text-danger">{{ $errors->first('gender')}}</p>
                        @endif
                    </div>
                    <div class="my-3">
                        <label>Date of Birth : </label>
                        <input type="date" name="dateOfBirth" class="form-control" value="{{ $customer->date_of_birth }} ">
                        @if ($errors->has('dateOfBirth'))
                            <p class="text-danger">{{ $errors->first('dateOfBirth')}}</p>
                        @endif
                    </div>
                    <div class="my-3">
                        <label>Phone : </label>
                        <input type="number" name="phoneNumber" class="form-control" value="{{ $customer->phone }} ">
                        @if ($errors->has('phoneNumber'))
                            <p class="text-danger">{{ $errors->first('phoneNumber')}}</p>
                        @endif
                    </div>
                    <div class="my-3 float-end">
                        <input type="submit" value="Update" class="btn btn-dark text-white">
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <a href="{{route('customer#list')}}"><button class="btn btn-sm bg-dark text-white">Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
