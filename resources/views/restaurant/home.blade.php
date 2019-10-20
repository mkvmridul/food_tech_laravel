
@extends('layouts.master')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Restaurant <span class="float-right"><a href="#" data-toggle="modal" data-target="#add_item_form"> + Add Menu Items</a></span></div>
                
                <div class="card-body">
                    <div class="card-top">
                        <img src="/assets/images/shop.png" class="card-img-top" alt="" style="width: 10%;">
                        <h4 class="d-inline ml-3">Welcome <span class="text-primary">{{ucfirst($profile->name)}}</span> Restaurant</h4>
                        &nbsp;
                        <span class="badge badge-secondary">
                            <span>open at : <span class="badge badge-success ">{{$profile->opening_hours}}</span>
                            &nbsp;&nbsp;
                            <span>close at : <span class="badge badge-success ">{{$profile->closing_hours}}</span>
                        </span>
                        <br>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <div class="card-body">
                        @if(count($items) > 0)
                            {{-- list all menu items --}}
                            <h5>My Menu Items :</h5>
                            <br>
                            <ul class="list-group">
                                @foreach($items as $item)
                                <li class="list-group-item">
                                    <span>
                                        <span class="badge badge-success">₹ {{$item['amount']}}</span>
                                        @if($item['type'] == 'veg')
                                            <span class="badge badge-success float-right">veg</span>
                                        @elseif($item['type'] == 'non_veg')
                                            <span class="badge badge-danger float-right">non-veg</span>
                                        @endif
                                    </span>
                                    &nbsp;
                                    &nbsp;
                                    <span style="display: inline;">
                                        <h4>{{$item['title']}}</h4>
                                        <p>{{$item['details']}}</p>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <center>
                                <h4>No Items in your Menu</h4> <span class="text-success"> <a href="#" data-toggle="modal" data-target="#add_item_form">Add now</a></span>
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


<!-- Add menu item Modal -->
<div class="modal fade" id="add_item_form" tabindex="-1" role="dialog" aria-labelledby="add_item_lable" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add_item_lable">Add Item to Your Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

                <form method="post" action="{{route('menu.create')}}" class="p-3">
                    @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title* : </label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="Add Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-sm-2 col-form-label">Item Description* : </label>
                            <div class="col-sm-10">
                                <textarea name="details"  class="form-control" id="details" placeholder="Add Item Details" value={{old('details')}}></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type* : </label>
                            <div class="col-sm-10">
                                <select class="form-control col-md-6" id="type" name="type" >
                                    <option value="veg">vegetarian</option>
                                    <option value="non_veg">Non vegetarian</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Price* (₹) :</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" id="amount" value="{{old('amount')}}" placeholder="Price of Item">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
        </div>
    </div>
    </div>
@endsection
