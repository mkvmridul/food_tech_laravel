@extends('layouts.master')

@section('main')
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header"> Hello {{Auth::user()->name}} </div> --}}
                    
                    <div class="card-body">
                        <div class="card-top">
                            <img src="/assets/images/shop.png" class="card-img-top" alt="" style="width: 10%; border-radius: 50%;">
                            <h4 class="d-inline ml-3">Welcome <span class="text-primary">{{ucfirst(Auth::guard('restaurant')->user()->name)}}</span> </h4>
                            <br>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <div class="card-body">
                            @if(count($items) > 0)
                                {{-- list all menu items --}}
                                <h5>My Orders :</h5>
                                <br>
                                <ul class="list-group">
                                    @foreach($items as $item)
                                    <li class="list-group-item">
                                        <span>
                                            <span class="badge badge-success">₹ {{$item[0]['amount']}}</span>
                                            @if($item[0]['type'] == 'veg')
                                                <span class="badge badge-success float-right">veg</span>
                                            @elseif($item[0]['type'] == 'non_veg')
                                                <span class="badge badge-danger float-right">non-veg</span>
                                            @endif
                                        </span>
                                        &nbsp;
                                        &nbsp;
                                        <span style="display: inline;">
                                            <h4>{{$item[0]['title']}}</h4>
                                            <p>{{$item[0]['details']}}</p>
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            @else
                                <center>
                                    <h4>No Any Orders yet!</h4> <span class="text-success"> <a href="{{route('menus')}}" >Order now</a></span>
                                    <img src="/assets/images/empty.png" width="100%"/>
                                </center>
                            @endif
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection