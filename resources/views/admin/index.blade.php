@extends('admin.layout_admin.layout_admin')
@section('title', 'Dashboard')

@section('content')
    @php
        $totalProduct = \App\Models\Product::count();
        $totalCustomer = \App\Models\Customer::count();
        $totalBill = \App\Models\Bill::count();
        $totalStaff = \App\Models\Staff::count();
    @endphp

    <div class="container px-6 py-2 mx-auto">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-3xl font-medium text-gray-700">THÔNG TIN NHANH</h3>
            <div class="mt-4 flex flex-wrap -mx-6">
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full my-4">
                                <i class="fas fa-user text-white"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $totalCustomer }}</h4>
                                <div class="text-gray-500"><b>KHÁCH HÀNG</b></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="#">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full my-4">
                                <i class="fa-solid fa-user-tie text-white"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $totalStaff }}</h4>
                                <div class="text-gray-500"><b>NHÂN VIÊN</b></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="{{ route('products.index') }}">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full my-4">
                                <i class="fas fa-star text-white"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProduct }}</h4>
                                <div class="text-gray-500"><b>SẢN PHẨM</b></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full my-4">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $totalBill }}</h4>
                                <div class="text-gray-500"><b>HÓA ĐƠN</b></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
