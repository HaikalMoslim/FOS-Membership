@extends('layouts.admin')

@section('title')
    Maps
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Outlet Location</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->address}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/locations/'.$item->image)}}" class="cate-image"alt="Image here">
                        </td>
                        <td>
                            <a href="{{url('edit-location/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('delete-location/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection