@extends('admin.layout_admin.layout_admin')
@section('title', 'Nhân viên')
@section('content')

    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">QUẢN LÝ NHÂN VIÊN</h1>
            <div class="block sm:flex justify-between">
                <div class="sm:w-1/3 px-3">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-40">
                        <a href="{{ url('admin/staffs/create') }}">Thêm nhân viên</a>
                    </button>
                </div>
            </div>
        </div>
        <hr>
        @if (@session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
                role="alert">
                <p class="font-bold">THÀNH CÔNG</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-amber-500 text-amber-700 p-4 transition-opacity duration-500"
                role="alert">
                <p class="font-bold">CHÚ Ý</p>
                @foreach ($errors->all() as $error)
                    <p class="">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('staffs.index') }}" method="get" class="my-5">
            <div class="w-full block sm:flex justify-end px-3 ">
                @if ($isFilter)
                    <a href="{{ route('staffs.index') }}"
                        class="w-fit flex justify-center items-center mt-1 h-6 px-3 rounded-full bg-gray-300"><i
                            class="fa-solid fa-xmark mr-1 mt-1"></i>Bỏ lọc</a>
                @endif
                <div class="w-full my-2 sm:my-0 sm:w-fit flex sm:mr-3">
                    <div class="mr-1 mb-1 w-1/2 sm:w-full">
                        <select name="FilterStaffPosition" id="filter-position" class="px-3 h-8 border-0 w-full">
                            <option selected disabled hidden>Chức vụ</option>
                            @foreach ($positions as $position)
                                @if ($selected['filter-position'] == $position->StaffPositionId)
                                    <option value="{{ $position->StaffPositionId }}" selected>
                                        {{ $position->StaffPositionName }}</option>
                                @else
                                    <option value="{{ $position->StaffPositionId }}">
                                        {{ $position->StaffPositionName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-1 mb-1 w-1/2 sm:w-full">
                        <select name="FilterStaffId" id="filter-orderBy" class="px-3 h-8 border-0 w-full">
                            <option selected disabled hidden>Ngày tạo</option>
                            <option value="desc" {{ $selected['orderBy' ?? ''] == 'desc' ? 'selected' : '' }}>Trễ nhất
                            </option>
                            <option value="asc" {{ $selected['orderBy' ?? ''] == 'asc' ? 'selected' : '' }}>Sớm nhất
                            </option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <button
                        class="px-3 w-full h-8 border text-white bg-blue-700 border-blue-700 rounded-lg hover:bg-blue-800">
                        Lọc nhân viên
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 hidden lg:table-cell text-center">
                        #
                    </th>
                    <th scope="col" class="py-3 sm:text-center">
                        Chức vụ
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Tên nhân viên
                    </th>
                    <th scope="col" class="py-3 hidden xl:table-cell text-center">
                        Giới tính
                    </th>
                    <th scope="col" class="py-3 hidden sm:table-cell text-center">
                        Email
                    </th>
                    <th scope="col" class="py-3 hidden md:table-cell text-center">
                        Số điện thoại
                    </th>
                    <th scope="col" class="py-3 text-center">

                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() == 0)
                    <th scope="row" colspan="6"
                        class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap text-center">
                        không có nhân viên nào phù hợp
                    </th>
                @endif
                @foreach ($data as $dt)
                    @php
                        $user = \App\Models\User::where('Email', $dt->Email)->first('active');
                    @endphp
                    <tr class="bg-white border-b">
                        <th scope="row"
                            class="py-4 hidden lg:table-cell font-medium text-gray-900 whitespace-nowrap text-center">
                            {{ $dt->StaffId }}
                        </th>
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $dt->getStaffPositionName->StaffPositionName }}
                        </th>
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $dt->StaffName }}
                        </th>
                        <td class="py-4 text-center hidden xl:table-cell">
                            {{ $dt->Gender == 1 ? 'Nam' : 'Nữ' }}
                        </td>
                        <td class="py-4 text-center hidden sm:table-cell">
                            {{ $dt->Email }}
                        </td>
                        <td class="py-4 text-center hidden md:table-cell">
                            {{ $dt->Phone }}
                        </td>
                        <td class="text-center flex justify-center items-center translate-y-3 space-x-1">
                            <button>
                                <a href="{{ route('staffs.show', $dt->Email) }}">
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
                            @if (Auth::user()->account_type == 2 && Auth::user()->email != $dt->Email)
                                @if ($user->active == 1)
                                    <form action="{{ route('staffs.update') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="Email" value="{{ $dt->Email }}">
                                        <input type="hidden" name="Active" value=0>
                                        <button class=" text-red-500 hover:text-red-700 mx-1"><i
                                                class="fa-solid fa-lock text-xl"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('staffs.update') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="Email" value="{{ $dt->Email }}">
                                        <input type="hidden" name="Active" value=1>
                                        <button class=" text-blue-500 hover:text-blue-700 mx-1"><i
                                                class="fa-solid fa-lock-open text-xl"></i></button>
                                    </form>
                                @endif
                            @else
                                <div class="mx-1 invisible"><button class=" text-red-500 hover:text-red-700 mx-1"><i
                                    class="fa-solid fa-lock text-xl"></i></button></div>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <div class="mt-2 px-2 text-center">
        </div> --}}
    </div>
    {{-- <script>
        var ram = document.getElementById("filter-ram").value;
        var memory = document.getElementById("filter-memory").value;
        var unit_price = document.getElementById("filter-unit-price").value;
    </script> --}}
@endsection
