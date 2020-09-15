@extends('template.sanpham')
@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row featured__filter">
                @foreach($dssp as $sp)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ $sp->hinh_anh }}">
                                <ul class="featured__item__pic__hover">
                                <li><a href="{{'/sanpham/'.$sp->id}}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{'/sanpham/'.$sp->id}}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{'/sanpham/'.$sp->id}}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ url('/sanpham/'.$sp->id) }}">{{ $sp->ten_sp }}</a></h6>
                                <h5>{{$sp->gia}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
             
                
               
                
            </div>
        </div>
    </section>
@endsection