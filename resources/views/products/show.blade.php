@extends('layout.layout_product_show')
@section('title', $title)
@section('content')
    
    <div class="flex justify-center items-center">
        <div class="w-4/5 bg-gray-500 h-screen flex mt-3">
            <div class="w-full md:w-1/2 bg-slate-300 h-full">
                @foreach ($images as $image)
                <img class="mx-auto "
                src="{{ URL('images/Details/' . $product->ProductName . '/' . $item->ProductImage) }}" width="100%"
                alt="">
                @endforeach
            </div>
            <div class="w-full md:w-1/2 bg-slate-700 h-full"></div>
        </div>
    </div>

    {{-- <form action="{{route('carts.add')}}" method="post">
        @csrf
        <input type="hidden" name="ProductId" value="{{$product->ProductId}}">
        <input type="hidden" name="Quantity" value=1>
        <div class="py-20 w-full text-center text-white">
            {{$product->ProductName . " " . $product->Memory}}
        </div>
        <button class="border border-blue-500 h-10 text-white bg-blue-500 rounded-lg">Thêm vào giỏ hàng</button>
    </form> --}}
@endsection