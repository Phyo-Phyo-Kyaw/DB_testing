@extends('myLayout.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-3">
        @if (Session::has('deleteSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('deleteSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::has('updateSuccess'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ Session::get('updateSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="input-group mb-3 col-md-4">
            <input type="text" class="form-control" placeholder="Serach...." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button class="btn btn-outline-secondary" type="button">Search</button>
          </div>
        <table class="table table-hover text-center">
            <thead class="bg-dark text-white">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($customer as $item)
                <tr>
                    <td>{{ $item->customer_id }}</td>
                    <td>{{$item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ route('customer#edit' , $item->customer_id )}}"><button class="btn btn-sm bg-dark text-white">Edit</button></a>
                        <a href="{{ route('customer#delete' ,$item->customer_id )}}"><button class="btn btn-sm bg-danger text-white">Delete</button></a>
                        <a href="{{ route('customer#seeMore' ,$item->customer_id )}}"><button class="btn btn-sm bg-secondary text-white float-end">See More...</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

            {{
                $customer->links();
            }}

        <a href="{{route('customer#register')}}"><button class="btn bg-primary text-white float-end">Back</button></a>
    </div>
</div>
@endsection
