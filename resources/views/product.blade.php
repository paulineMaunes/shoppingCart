@extends('master')
<style>
    .fadeIn {
        -webkit-animation-duration: 5s;
        -webkit-animation-delay: 1.5s;
    }

    .bounceInRight {
        -webkit-animation-duration: 5s;
        -webkit-animation-delay: 2.5s;
    }

    .rubberBand {
        -webkit-animation-duration: 5s;
        -webkit-animation-delay: 4s;
    }

    a#btn-shake {
        width: 200px;
        height: 40px;
        clear: both;
        display: inline-block;
        margin: 0px auto;

        animation-name: shake-with-delay;
        animation-duration: 6s;
        animation-iteration-count: infinite;
    }

    @keyframes shake-with-delay {
        from, 16%, to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        1.6%, 4.8%, 8%, 11.2%, 14.4% {
            -webkit-transform: translate3d(-10px, 0, 0);
            transform: translate3d(-10px, 0, 0);
        }
        3.2%, 6.4%, 9.6%, 12.8% {
            -webkit-transform: translate3d(10px, 0, 0);
            transform: translate3d(10px, 0, 0);
        }
    }



    .fadeInLeft {
        -webkit-animation-duration: 5s;
        -webkit-animation-delay: 2s;
    }

</style>
@section('content')

    <div class="container animated fadeIn">

        @if (Session::has('success_message'))
            <div role="alert" class='alert alert-success animated bounceInRight'>
                {{ Session::get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger animated bounceInRight">
                {{ session()->get('error_message') }}
            </div>
        @endif



        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->name }}</p>
        <h1>{{ $product->name }}</h1>

        <hr>

        <div class="row">
            <div class="product view overlay hm-white-slight col-md-4 tile">
                <img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive tiles img-fluid" alt="">
                <a href="#">
                    <div class="mask"></div>
                </a>
            </div>

            <div class="col-md-8">
                <h3>${{ $product->price }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side animated fadeIn" >
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn unique-color btn-lg animated rubberBand" value="Add to Cart">
                </form>

                <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn warning-color btn-lg animated " value="Add to Wishlist">
                </form>

                <p><pre>{{ $product->description }}</pre></p>
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->



        <div class="row img-responsive">
            <h3>You may also like...</h3>

            @foreach ($interested as $product)
                <div class="animated fadeInLeft col-md-2 img-fluid view overlay hm-white-slight">
                    <div class="card">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->slug]) }}"><img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-rounded view overlay hm-white-slight" ><div class="mask"></div></a>
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->price }}</p>
                            </a>
                        </div> <!-- end caption -->
                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach

        </div> <!-- end row -->

        <div class="spacer"></div>


    </div> <!-- end container -->



@endsection
