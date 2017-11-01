@extends('master')
<style>
    .fadeIn {
        -webkit-animation-duration: 5s;
        -webkit-animation-delay: 2.5s;
    }

    /*.bounceInRight {*/
        /*-webkit-animation-duration: 5s;*/
        /*-webkit-animation-delay: 2.5s;*/
    /*}*/

    /*.rubberBand {*/
        /*-webkit-animation-duration: 5s;*/
        /*-webkit-animation-delay: 4s;*/
    /*}*/

    /*.fadeInLeft {*/
        /*-webkit-animation-duration: 5s;*/
        /*-webkit-animation-delay: 2s;*/
    /*}*/

    .banne{
        margin-top: -25;
        width: 100%;
        height: 400px;
        overflow: hidden;
        background-size:fit;
    }

    .dot{
       opacity: 0;
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }

</style>
@section('content')
    <div class="slideshow-container banne">
        <div class="mySlides animated fadeInLeft">
            <img src="img/womanfashion.jpg" style="width:100%">
        </div>

        <div class="mySlides animated bounceInRight">
            <img src="img/cropped-makeup-banner-ed-1.png" style="width:100%">
        </div>

        <div class="mySlides animated fadeInLeft">
            <img src="img/top_banner.jpg" style="width:100%">
        </div>

        <div class="mySlides animated pulse">
            <img src="img/home appliances.jpg" style="width:100%">
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>

    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>





    {{--<div class="banne text-center animated fadeInLeft">--}}
        {{--<img src="{{ asset('img/sale-banners-tips-business-owners.jpG') }}" width="100%" height="100%" >--}}
    {{--</div>--}}
    {{--<br>--}}

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







        <h1>Our Products</h1>
        @foreach ($products->chunk(6) as $items)
            <div class="row img-responsive">
                @foreach ($items as $product)
                    <div class="wow animated fadeIn col-md-2 img-fluid view overlay hm-white-slight">
                        <div class="wow card img-rounded ">
                            <div class="caption text-center">
                                <a href="{{ url('shop', [$product->slug]) }}"><img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-rounded view overlay hm-white-slight" ><div class="mask"></div></a>
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->price }}</p>
                                </a>
                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                    <a href="#">
                        <div class="mask"></div>
                    </a>
                @endforeach
            </div> <!-- end row -->
        @endforeach
        <div class="spacer"></div>
    </div> <!-- end container -->





@endsection
