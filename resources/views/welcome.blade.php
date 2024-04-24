@extends('layout.layout')
@section('title', 'TopZone - Cửa hàng Apple chính hãng')
@section('content')
    {{-- Banner --}}
    <section>
        <div class="banner-slider w-full h-[410px] pt-[56px]">
            <div class="w-full h-[410px] bg-red-500"></div>
            <div class="w-full h-[410px] bg-blue-500"></div>
            <div class="w-full h-[410px] bg-green-500"></div>
            <div class="w-full h-[410px] bg-orange-500"></div>
            <div class="w-full h-[410px] bg-amber-500"></div>
        </div>
        <div class="w-full flex justify-center">
            {{-- Category --}}
            <div class="w-full lg:8/12 xl:w-7/12">
                <div class="">
                    <div class="py-10 grid grid-cols-2 sm:grid-cols-3 gap-5 md:gap-0 md:grid-cols-4 place-items-center">
                        <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="">
                                <img src="{{ URL('images/Thumbnails/Homepage/IP_Desktop.webp') }}" class="" alt="">
                                <div class="text-white text-center">iPhone</div>
                            </a>
                        </div>
                        <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="">
                                <img src="{{ URL('images/Thumbnails/Homepage/IPad_Desktop.webp') }}" class="" alt="">
                                <div class="text-white text-center">iPad</div>
                            </a>
                        </div>
                        <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="">
                                <img src="{{ URL('images/Thumbnails/Homepage/Mac_Desktop.webp') }}" class="" alt="">
                                <div class="text-white text-center">Mac</div>
                            </a>
                        </div>
                        <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="">
                                <img src="{{ URL('images/Thumbnails/Homepage/Watch_Desktop.webp') }}" class="" alt="">
                                <div class="text-white text-center">Watch</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="w-full px-20">
        {{-- iPhone --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('products.index', ['iPhone']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> iPhone</a>
                </div>
                <div class="iphone-slider py-10 place-items-center">
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                </div>
            </div>
        </section>
        {{-- iPad --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('products.index', ['iPhone']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> iPad</a>
                </div>
                <div class="ipad-slider py-10 place-items-center">
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                </div>
            </div>
        </section>
        {{-- Mac --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('products.index', ['Mac']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> Mac</a>
                </div>
                <div class="mac-slider py-10 place-items-center relative">
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                </div>
            </div>
        </section>
        {{-- Watch --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('products.index', ['Watch']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> Watch</a>
                </div>
                <div class="watch-slider py-10 place-items-center">
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[280px] max-w-[280px] h-[430px] rounded-lg"></div>
                </div>
            </div>
        </section>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js"
        integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".banner-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots:true,
                arrows: false,
            });

            $(".iphone-slider, .ipad-slider, .mac-slider, .watch-slider").slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                dots: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 720,
                        settings: {
                            centerMode: true,
                            centerPadding: '100px',
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            centerMode: true,
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });

        });
    </script>
@endsection
