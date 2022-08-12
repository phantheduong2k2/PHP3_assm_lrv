@extends('layout.client-layout')
@section('page-title', 'Login')
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

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="assets/images/client/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="assets/images/client/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="assets/images/client/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.html"
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


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{ Route('postLogin-client') }}" method="POST">
                        @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Log in user
                        </h4>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="{{ old('email_lg') }}" type="text" name="email"
                                placeholder="Your email">
                                @if ($errors->has('email_lg'))
                                <div class="alert alert-danger"><span>{{ $errors->first('email_lg') }} </span></div>
                            @endif
                        </div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="{{ old('password_lg') }}" type="password" name="password"
                                placeholder="Password">
                                @if ($errors->has('password_lg'))
                                <div class="alert alert-danger"><span>{{ $errors->first('password_lg') }} </span></div>
                            @endif
                        </div>
                        @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                     <div  class="custom-control custom-checkbox text-left mb-4 mt-2">
                        <input type="checkbox" style="margin-right: 10px" id="customCheck1"> Nhớ tài khoản của tôi
                    </div>
                    <div class="custom-control custom-checkbox text-left mt-3">  <a href="{{ Route('getLoginGoogle') }}">Login Google</a></div>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{ Route('regiter-client') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                           Regiter user
                        </h4>
                        @if (session('msg_rg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg_rg') }}
                        </div>
                    @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="{{ old('name') }}" type="text" name="name"
                                placeholder="Your username">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger"><span>{{ $errors->first('name') }} </span></div>
                            @endif
                        </div>
                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" value="{{ old('password') }}" name="password"
                                placeholder="Password">
                                @if ($errors->has('password_rg'))
                                <div class="alert alert-danger"><span>{{ $errors->first('password') }} </span></div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Avatar</label>
                            <input type="file" class="form-control" name="avatar" placeholder="avatar" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                                placeholder="Your email">
                                @if ($errors->has('email'))
                                <div class="alert alert-danger"><span>{{ $errors->first('email') }} </span></div>
                            @endif
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"  value="{{ old('phone') }}"  name="phone"
                                placeholder="Your phone number">
                                @if ($errors->has('phone'))
                                <div class="alert alert-danger"><span>{{ $errors->first('phone') }} </span></div>
                            @endif
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                           <textarea class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"  name="address"  cols="25" rows="10"   placeholder="Your address">{{   old('address')}}</textarea>
                           @if ($errors->has('address'))
                           <div class="alert alert-danger"><span>{{ $errors->first('address') }} </span></div>
                       @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><h5>Level của người dùng</h5> </label>
                            <select name="level" class="form-control"  id="inputState">
                                <option value="0">Khách hàng</option>
                                <option value="1"">Nhân viên</option>
                                <option value="2">Quản trị</option>
                            </select>
                        </div>
                        <div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" style="margin-right: 10px" id="customCheck1"> Tôi đồng ý với tất điều khoản trên
						</div>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
