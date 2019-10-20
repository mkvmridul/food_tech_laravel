
@extends('layouts.master')

@section('main')
    <div class="container mt-3">
        <center>
            @foreach($menus as $menu)
                <div class="card col-sm-3 mb-3 mr-3" style="display: inline-block;">
                    <img src="/assets/images/{{$menu['type']}}.png" class="card-img-top" alt="" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title">{{$menu['title']}} 
                            @if($menu['type'] == 'veg')
                                <span class="badge badge-success">veg</span>
                            @elseif($menu['type'] == 'non_veg')
                                <span class="badge badge-danger">non-veg</span>
                            @endif
                        </h5>
                        <p class="card-text">{{$menu['details']}}</p>
                        @if(Auth::check())
                            <button menu_id={{$menu['id']}} id="menu_id_button" class="btn btn-primary">order @ ₹ <span class="badge badge-success">{{$menu['amount']}}</span></button>
                        @else
                            <a href="{{route('login')}}" class="btn btn-primary">Login to order</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </center>
    </div>

    <form id="order" action="{{route('order')}}" method="POST" style="display: none;">
            @csrf   
            <input type="hidden" id="menu_id" name="menu_id" value=""/>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#menu_id_button' , function(){
            var menu_id = $(this).attr('menu_id');
            $('#menu_id').attr('value',menu_id);
            $('#order').submit();
        });
    </script>
@endsection