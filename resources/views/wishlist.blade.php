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
        @if (sizeof(Cart::instance('wishlist')->content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>

                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::instance('wishlist')->content() as $item)
                    <tr>
                        <td class="table-image"><a href="{{ url('shop', [$item->model->slug]) }}"><img src="{{ asset('img/' . $item->model->image) }}" alt="product" class="img-responsive cart-image"></a></td>
                        <td><a class="orange-text" href="{{ url('shop', [$item->model->slug]) }}">{{ $item->name }}</a></td>

                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('wishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn warning-color btn-sm" value="Remove">
                            </form>

                            <form action="{{ url('switchToCart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn unique-color btn-sm" value="Move to Cart">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="spacer"></div>

            <a href="/shop" class="btn unique-color btn-lg">Continue Shopping</a> &nbsp;

            <div style="float:right">
                <form action="{{ url('/emptyWishlist') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn stylish-color-dark btn-lg" value="Empty Wishlist">
                </form>
            </div>

        @else

            <h3>You have no items in your Wishlist</h3>
            <a href="/shop" class="btn unique-color btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    </script>
@endsection
