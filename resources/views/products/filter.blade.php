@extends('layout.layout_product_show')
@section('title', $title)
@section('content')

<div class="w-full pb-20">
    <div class="text-center py-20">
        <a href="{{ route('products.index', $title) }}" class="text-white text-5xl"><i class="fa-brands fa-apple"></i>
            {{$title}}</a>
    </div>
    <div class="flex justify-center">
        <div class="container sm:px-10 text-gray-300 text-md">
            <a href="{{ route('list', $type) }}" class="mx-5 hover:text-white hover:transition-all delay-100 pb-3 hover:border-b">
                Tất cả
            </a>
            @foreach ($models as $model)
                @if ($model->ProductModelName == $title)
                    <a href="{{ route('filter', $model->ProductModelName) }}"
                        class="mx-5 text-white pb-3 border-b">
                        {{ $model->ProductModelName }}
                    </a>
                @else
                    <a href="{{ route('filter', $model->ProductModelName) }}"
                        class="mx-5 hover:text-white hover:transition-all delay-100 pb-3 hover:border-b">
                        {{ $model->ProductModelName }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="flex justify-center">
        <div class="py-10 px-10 grid grid-cols-3 gap-5 place-items-center">
            @foreach ($data as $item)
                <div
                    class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[380px] max-w-[380px] h-[470px] rounded-2xl place-content-center relative">
                    <a href="{{route('show', [$item->ProductName, $item->Memory])}}" class="text-center text-white flex flex-col gap-7">
                        <div>
                            <img class="mx-auto " src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                width="70%" alt="">
                        </div>
                        <div class="text-md">
                            {{ $item->ProductName . " " . $item->Memory }}
                        </div>
                        <div class="text-lg font-bold">
                            {{ number_format($item->UnitPrice) . '₫' }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
