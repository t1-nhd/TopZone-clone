@extends('layout.layout')
@section('title', 'TopZone - Cửa hàng Apple chính hãng')
@section('content')
    <section>
        {{-- Banner Slider (giữ nguyên) --}}
        <div class="banner-slider w-full">
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

        {{-- Category (giữ nguyên) --}}
        <div class="w-full flex justify-center">
            <div class="w-full lg:w-8/12 xl:w-7/12">
                <div class="py-10 grid grid-cols-2 sm:grid-cols-3 gap-5 md:gap-0 md:grid-cols-4 place-items-center">
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                        <a href="{{ route('list', 'iPhone') }}">
                            <img src="{{ URL('images/Thumbnails/Homepage/IP_Desktop.webp') }}" alt="">
                            <div class="text-white text-center">iPhone</div>
                        </a>
                    </div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                        <a href="{{ route('list', 'iPad') }}">
                            <img src="{{ URL('images/Thumbnails/Homepage/IPad_Desktop.webp') }}" alt="">
                            <div class="text-white text-center">iPad</div>
                        </a>
                    </div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                        <a href="{{ route('list', 'Mac') }}">
                            <img src="{{ URL('images/Thumbnails/Homepage/Mac_Desktop.webp') }}" alt="">
                            <div class="text-white text-center">Mac</div>
                        </a>
                    </div>
                    <div class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500 w-[180px] h-[220px] rounded-lg">
                        <a href="{{ route('list', 'Watch') }}">
                            <img src="{{ URL('images/Thumbnails/Homepage/Watch_Desktop.webp') }}" alt="">
                            <div class="text-white text-center">Watch</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="w-full px-5 sm:px-20">
        {{-- Product Slider Section --}}
        @php
            $categories = [
                ['name' => 'iPhone', 'typeId' => 1, 'sliderClass' => 'iphone-slider'],
                ['name' => 'iPad', 'typeId' => 2, 'sliderClass' => 'ipad-slider'],
                ['name' => 'Mac', 'typeId' => 3, 'sliderClass' => 'mac-slider'],
                ['name' => 'Watch', 'typeId' => 4, 'sliderClass' => 'watch-slider'],
            ];
        @endphp

        @foreach ($categories as $category)
            <section class="mb-12">
                <div class="text-center py-12">
                    <a href="{{ route('list', [$category['name']]) }}" class="text-white text-4xl sm:text-5xl">
                        <i class="fa-brands fa-apple"></i> {{ $category['name'] }}
                    </a>
                </div>
                <div class="product-slider {{ $category['sliderClass'] }} py-6 sm:py-10">
                    @foreach ($data as $item)
                        @if ($item->getProductModelName->ProductTypeId == $category['typeId'])
                            <div class="px-2">
                                <div class="bg-[#323232] hover:shadow-lg hover:shadow-gray-600 transition-all duration-300 max-w-[280px] h-[400px] sm:h-[430px] rounded-2xl flex flex-col justify-between p-6 relative mx-auto">
                                    @if ($item->isNew == 1)
                                        <div class="absolute top-4 right-4 border border-amber-600 text-amber-500 font-medium text-sm rounded-full w-16 h-8 flex items-center justify-center">
                                            New
                                        </div>
                                    @endif
                                    <a href="{{ route('show', [$item->ProductName, $item->Memory]) }}" class="text-center text-white flex flex-col gap-4 h-full justify-between">
                                        <div class="flex-1 flex items-center justify-center">
                                            <img class="max-w-[70%] max-h-[200px] object-contain mx-auto" src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}" alt="{{ $item->ProductName }}">
                                        </div>
                                        <div>
                                            <div class="text-sm sm:text-md font-medium">{{ $item->ProductName . ($item->Memory ? ' ' . $item->Memory : '') }}</div>
                                            <div class="text-lg sm:text-xl font-bold mt-2">{{ number_format($item->UnitPrice) . '₫' }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>

    {{-- CSS for improved styling --}}
    <style>
        .product-slider .slick-slide {
            transition: transform 0.3s ease;
        }
        .product-slider .slick-slide:hover {
            transform: translateY(-5px);
        }
        .product-slider .slick-prev,
        .product-slider .slick-next {
            z-index: 10;
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
        }
        .product-slider .slick-prev:hover,
        .product-slider .slick-next:hover {
            background: rgba(0, 0, 0, 0.8);
        }
        .product-slider .slick-prev {
            left: -50px;
        }
        .product-slider .slick-next {
            right: -50px;
        }
        @media (max-width: 640px) {
            .product-slider .slick-prev,
            .product-slider .slick-next {
                display: none !important;
            }
        }
    </style>

    {{-- JavaScript for sliders --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Banner Slider
            $('.banner-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false,
            });

            // Product Sliders
            const sliderSettings = {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                infinite: false,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 720,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '60px',
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 540,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: false,
                            arrows: false,
                        }
                    }
                ]
            };

            $('.iphone-slider, .ipad-slider, .mac-slider, .watch-slider').each(function() {
                $(this).slick(sliderSettings);
            });
        });
    </script>
@endsection