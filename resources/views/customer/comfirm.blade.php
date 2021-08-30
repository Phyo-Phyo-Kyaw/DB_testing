@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card ">
            <div class="card-header fs-3 text-center">
                Customer Comfirm  Data
            </div>
            <div class="card-body fs-4 ms-5 ps-5">

                <div class="my-3">
                    <label>Name : </label> <label>{{$customer['name']}}</label>
                </div>
                <div class="my-3">
                    <label>Email : </label> <label>{{$customer['email']}}</label>
                </div>
                <div class="my-3">
                    <label>Address : </label> <label>{{$customer['address']}}</label>
                </div>
                <div class="my-3">
                    <label>Gender : </label>
                    <label>
                        @if ($customer['gender'] == 1)
                            Male
                        @elseif ($customer['gender'] == 2)
                            Female
                        @elseif ($customer['gender'] == 0)
                            Others
                        @endif
                    </label>
                </div>
                <div class="my-3">
                    <label>Date of Birth : </label> <label> {{$customer['date_of_birth']}}</label>
                </div>
                <div class="my-3">
                    <label>Phone : </label> <label>{{$customer['phone']}}</label>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('customer#edit' , $customer['id'])}}"><button class="btn btn-sm bg-dark text-white">Cancel</button></a>
                <a href="{{route('customer#realUpdate')}}"><button class="btn btn-sm bg-info text-white">Save</button></a>

            </div>
        </div>
    </div>
</div>
@endsection
