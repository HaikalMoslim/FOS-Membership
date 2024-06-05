@extends('layouts.front')

@section('title')
    Category Page
@endsection

@section('content')

<div class="py-3 mb-3 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('category')}}">
                Collections
            </a>
        </h6>
    </div>
</div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">All Categories</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{url('category/'.$cate->slug)}}">
                                    <div class="card">
                                        <img src="{{asset('assets/uploads/category/'.$cate->image)}}" alt="Category Image">
                                        <div class="card-body">
                                            <h5>{{$cate->name}}</h5>
                                            <p>
                                                {{$cate->description}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection