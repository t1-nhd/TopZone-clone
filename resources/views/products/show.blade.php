@extends('layout.layout')
@section('title', $title)
@section('content')
    {{-- <form action="{{route('carts.add')}}" method="post">
        @csrf
        <input type="hidden" name="ProductId" value="{{$product->ProductId}}">
        <input type="hidden" name="CustomerId" value="C000000001">
        <div class="py-20 w-full text-center text-white">
            {{$product->ProductName . " " . $product->Memory}}
        </div>
        <button class="border border-blue-500 h-10 text-white bg-blue-500 rounded-lg">Thêm vào giỏ hàng</button>
    </form> --}}
@endsection