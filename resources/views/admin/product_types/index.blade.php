@extends('admin.layout_admin.layout_admin')
@section('title', 'Dòng sản phẩm')
@section('content')
    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">LOẠI SẢN PHẨM</h1>
        </div>
        <hr>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">
                        Tên loại sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3 text-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $dt->ProductTypeName }}
                        </th>
                        <td class="text-right">
                            <form action="{{route('product_types.destroy', $dt->ProductTypeId)}}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button>
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
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
