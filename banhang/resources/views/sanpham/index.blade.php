@extends('template.banhang')
@section('content')
    
    
    <section class="featured spad">
        <form class="searchform cf" action="{{ url('/timkiem') }}" method="get">
            <input type="text" placeholder="Is it me you’re looking for?" name="tu_khoa">
            <button type="submit">Search</button>
        </form>
        <div class="container">
            <div class="row featured__filter">
                @foreach ($dssp as $sanpham)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ $sanpham->hinh_anh }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ url('/sanpham/' . $sanpham->id) }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('/sanpham/' . $sanpham->id) }}"><i class="fa fa-retweet"></i></a>
                                    </li>
                                    <li><a href="{{ url('/sanpham/' . $sanpham->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ url('/sanpham/' . $sanpham->id) }}">{{ $sanpham->ten_sp }}</a></h6>
                                <h5>{{ $sanpham->gia }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
