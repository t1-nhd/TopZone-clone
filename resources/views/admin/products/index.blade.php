@extends('admin.layout_admin.layout_admin')
@section('title', 'Sản phẩm')
@section('content')

    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">SẢN PHẨM</h1>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-40">
                <a href="{{ route('products.create') }}">Thêm sản phẩm</a>
            </button>
        </div>
        <hr>
        @if (@session('thanh-cong'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
            role="alert">
            <p class="font-bold">THÀNH CÔNG</p>
            <p>{{ session('thanh-cong') }}</p>
        </div>
    @endif
    @if (@session('that-bai'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 transition-opacity duration-500" role="alert">
            <p class="font-bold">THẤT BẠI</p>
            <p>{{ session('that-bai') }}</p>
        </div>
    @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 w-3/12">
                    </th>
                    <th scope="col" class="py-3 text-center w-4/12">
                        Tên sản phẩm
                    </th>
                    <th scope="col" class="py-3 hidden xl:table-cell text-center w-1/12">
                        Model
                    </th>
                    <th scope="col" class="py-3 hidden sm:table-cell text-center w-1/12 text-nowrap">
                        Dung lượng
                    </th>
                    <th scope="col" class="py-3 hidden lg:table-cell text-center w-1/12">
                        Đơn giá
                    </th>
                    <th scope="col" class="py-3 text-center w-2/12">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            <img src="{{ URL('images/Thumbnais/' . $dt->ProductThumbnail) }}"
                                class="w-20 lg:w-1/2 sm:min-w-20" alt="">
                        </th>
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $dt->ProductName }}
                        </th>
                        <td class="py-4 text-center hidden xl:table-cell">
                            {{ $dt->getProductModelName->ProductModelName }}
                        </td>
                        <td class="py-4 text-center hidden sm:table-cell">
                            {{ $dt->Memory }}
                        </td>
                        <td class="py-4 text-center hidden lg:table-cell">
                            {{ number_format($dt->UnitPrice) . '₫' }}
                        </td>
                        <td class="text-center">
                            <button>
                                <a href="{{ route('products.show', $dt->ProductId) }}">
                                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 96 96"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g>
                                            <path d="M18,24H78a6,6,0,0,0,0-12H18a6,6,0,0,0,0,12Z" />
                                            <path d="M78,42H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                            <path d="M78,72H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                        </g>
                                    </svg>
                                </a>
                            </button>
                            <button>
                                <a href="{{ route('products.edit', $dt->ProductId) }}" class="w-1">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g id="Complete">
                                            <g id="edit">
                                                <g>
                                                    <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                        fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <polygon fill="none"
                                                        points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </button>
                            <button>
                                <a href="{{ route('products.delete', $dt->ProductId) }}" class="w-1">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2 px-2 text-center">
        </div>
    </div>
@endsection
