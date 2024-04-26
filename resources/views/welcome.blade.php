@extends('layout.layout')
@section('title', 'TopZone - Cửa hàng Apple chính hãng')
@section('content')

    <section>
        {{-- Banner --}}
        <div class="banner-slider w-full pt-[80px] sm:pt-[56px]">
            <div class="w-full">
                <img src="{{ URL('images/Banner/AirPods-Pro-2-2880-800-1920x533.webp') }}" alt="">
            </div>
            <div class="w-full">
                <img src="{{ URL('images/Banner/AW-SE-DD-2880-800-1920x533.webp') }}" alt="">
            </div>
            <div class="w-full">
                <img src="{{ URL('images/Banner/dandau-2880-800--1--1920x533.webp') }}" alt="">
            </div>
            <div class="w-full">
                <img src="{{ URL('images/Banner/ip15-DD-2880-800-1920x533.webp') }}" alt="">
            </div>
            <div class="w-full">
                <img src="{{ URL('images/Banner/iPad-9-2880-800-1920x533-2.webp') }}" alt="">
            </div>
            <div class="w-full">
                <img src="{{ URL('images/Banner/MAC-Air-M2-DD-2880-800-1920x533.webp') }}" alt="">
            </div>
        </div>
        {{-- Category --}}
        <div class="w-full flex justify-center">
            <div class="w-full lg:8/12 xl:w-7/12">
                <div class="">
                    <div class="py-10 grid grid-cols-2 sm:grid-cols-3 gap-5 md:gap-0 md:grid-cols-4 place-items-center">
                        <div
                            class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="{{route('list', 'iPhone')}}">
                                <img src="{{ URL('images/Thumbnails/Homepage/IP_Desktop.webp') }}" class=""
                                    alt="">
                                <div class="text-white text-center">iPhone</div>
                            </a>
                        </div>
                        <div
                            class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="{{route('list', 'iPad')}}">
                                <img src="{{ URL('images/Thumbnails/Homepage/IPad_Desktop.webp') }}" class=""
                                    alt="">
                                <div class="text-white text-center">iPad</div>
                            </a>
                        </div>
                        <div
                            class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="{{route('list', 'Mac')}}">
                                <img src="{{ URL('images/Thumbnails/Homepage/Mac_Desktop.webp') }}" class=""
                                    alt="">
                                <div class="text-white text-center">Mac</div>
                            </a>
                        </div>
                        <div
                            class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                            <a href="{{route('list', 'Watch')}}">
                                <img src="{{ URL('images/Thumbnails/Homepage/Watch_Desktop.webp') }}" class=""
                                    alt="">
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
                    <a href="{{ route('list', ['iPhone']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> iPhone</a>
                </div>
                <div class="iphone-slider py-10 place-items-center">
                    @foreach ($data as $item)
                        @php
                            $sale = rand(10, 20);
                            $price = $item->UnitPrice + ($item->UnitPrice * ($sale / 100));
                        @endphp
                        
                        @if ($item->getProductModelName->ProductTypeId == 1)
                            <div
                                class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-2xl place-content-center relative">
                                @if ($item->isNew == 1)
                                    <div
                                        class="new-box border border-amber-600 text-amber-500 font-medium text-center flex justify-center items-center rounded-full w-16 h-8">
                                    </div>
                                @endif
                                <a href="{{route('show', [$item->ProductName, $item->Memory])}}" class="text-center text-white flex flex-col gap-7">
                                    <div>
                                        <img class="mx-auto "
                                            src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}" width="70%"
                                            alt="">
                                    </div>
                                    <div class="text-md">
                                        {{ $item->ProductName }}
                                    </div>
                                    <div class="text-lg font-bold">
                                        {{ number_format($item->UnitPrice) . '₫' }}
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        {{-- iPad --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('list', ['iPad']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> iPad</a>
                </div>
                <div class="ipad-slider py-10 place-items-center">
                    @foreach ($data as $item)
                        @if ($item->getProductModelName->ProductTypeId == 2)
                            <div
                                class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-2xl place-content-center text-wrap relative">
                                @if ($item->isNew == 1)
                                    <div
                                        class="new-box border border-amber-600 text-amber-500 font-medium text-center flex justify-center items-center rounded-full w-16 h-8">
                                    </div>
                                @endif
                                <a href="{{route('show', [$item->ProductName, $item->Memory])}}" class="text-center text-white flex flex-col gap-7">
                                    <div>
                                        <img class="mx-auto "
                                            src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}" width="70%"
                                            alt="">
                                    </div>
                                    <div class="text-md">
                                        {{ $item->ProductName }}
                                    </div>
                                    <div class="text-lg font-bold">
                                        {{ number_format($item->UnitPrice) . '₫' }}
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>  
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                </div>
            </div>
        </section>
        {{-- Mac --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('list', ['Mac']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> Mac</a>
                </div>
                <div class="mac-slider py-10 place-items-center relative">
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                </div>
            </div>
        </section>
        {{-- Watch --}}
        <section>
            <div class="">
                <div class="text-center py-20">
                    <a href="{{ route('list', ['Watch']) }}" class="text-white text-5xl"><i
                            class="fa-brands fa-apple"></i> Watch</a>
                </div>
                <div class="watch-slider py-10 place-items-center">
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] max-w-[280px] py-6 sm:py-0 sm:h-[430px] rounded-lg">
                    </div>
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
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false,
            });

            $(".iphone-slider, .ipad-slider, .mac-slider, .watch-slider").slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                dots: false,
                infinite: false,
                responsive: [{
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
                    },
                    {
                        breakpoint: 540,
                        settings: {
                            centerMode: false,
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
