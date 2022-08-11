@extends('layout.client-layout')
@section('page-title', 'contact')
@include('client.element_client.head-v4')
@section('main')
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>
    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        @php
        $total = 0;
    @endphp
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @foreach ($cart as $item )
                @php
                $thanhtien = $item->price * $item->quantity;
               @endphp
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="{{asset($item->avatar)  }}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{ $item->name_pro }}
                        </a>

                        <span class="header-cart-item-info">
                            <?= number_format($item->price, 0, '.') ?> VND
                        </span>
                    </div>
                </li>
                @php
                $total += $thanhtien;
              @endphp
                @endforeach

            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: <?= number_format($total, 0, '.') ?> VND
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ Route('client-viewCart') }}"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($cart == '')
         <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
@else
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>

                                <tr class="table_head">
                                    <th class="column-1">Image</th>
                                    <th class="column-2">Name</th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Size</th>
                                    <th class="column-5">Color</th>
                                    <th class="column-6">Quantity</th>
                                </tr>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($cart as $item)
                                @php
                                $thanhtien = $item->price * $item->quantity;
                               @endphp
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{asset($item->avatar)  }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $item->name_pro }}</td>
                                    <td class="column-3"> <?= number_format($item->price, 0, '.') ?> VND</td>
                                    <td class="column-4">{{ $item->pro_size }}</td>
                                    <td class="column-5"><span style="background-color: {{ $item->pro_color }}"
                                            class="badge badge-primary">color</span></td>
                                    <td class="column-6">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product1" value="{{ $item->quantity }}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $total += $thanhtien;
                              @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                name="coupon" placeholder="Coupon Code">

                            <div
                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div>
                        </div>

                        <div
                            class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Update Cart
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?= number_format($total , 0, '.') ?> VND
                            </span>

                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Address:
                            </span>
                        </div>
                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <textarea placeholder="địa chỉ nhân hàng" name="address" id="" cols="25" rows="5"> {{ Auth::user()->address }}</textarea>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Thông tin khách hàng
                                </span>


                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                        name="state" value="{{ Auth::user()->name }}">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                        name="postcode" value="{{ Auth::user()->phone }}}}">
                                </div>

                                <div class="flex-w">
                                    <div
                                        class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                     UPDATE USER
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">

                            <span class="mtext-110 cl2">
                                <?= number_format($total , 0, '.') ?> VND
                            </span>

                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif


@endsection
