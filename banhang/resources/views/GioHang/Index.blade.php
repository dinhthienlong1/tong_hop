@extends('template.banhang')

@section('content')
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($giohang['dssp'] as $sanpham)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset($sanpham['hinh_anh']) }}" alt="">
                                            <h5>{{ $sanpham['ten_sp'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $sanpham['gia'] }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $sanpham['soluong'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $sanpham['thanh_tien'] }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ url('/GioHang/Xoa/' . $sanpham['id_san_pham']) }}"
                                                onclick="return confirm('Are you sure?')">
                                                <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                </div>
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span> {{ number_format($giohang['tong_tien'], 0) }}</span></li>
                        </ul>
                    <a href="{{url('/Checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
