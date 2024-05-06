@extends('admin.layout_admin.layout_admin')
@section('title', 'Khách hàng')
@section('content')

    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">QUẢN LÝ KHÁCH HÀNG</h1>
            <div class="block sm:flex justify-between">
            </div>
            <hr>
            {{-- <form action="{{ route('customers.index') }}" method="get" class="my-5">
                <div class="w-full block sm:flex justify-end px-3 ">
                    @if ($isFilter)
                        <a href="{{ route('customers.index') }}"
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
            </form> --}}
            <hr>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 text-center">
                            Họ khách hàng
                        </th>
                        <th scope="col" class="py-3 text-center">
                            Tên khách hàng
                        </th>
                        <th scope="col" class="py-3 hidden xl:table-cell text-center">
                            Giới tính
                        </th>
                        <th scope="col" class="py-3 hidden xl:table-cell text-center">
                            Năm sinh
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
                    {{-- @if ($data->count() == 0)
                        <th scope="row" colspan="6"
                            class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap text-center">
                            không có khách hàng nào phù hợp
                        </th>
                    @endif --}}
                    @foreach ($data as $dt)
                        <tr class="bg-white border-b">
                            <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $dt->LastName }}
                            </th>
                            <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                {{ $dt->FirstName }}
                            </th>
                            <td class="py-4 text-center hidden xl:table-cell">
                                {{ $dt->Gender == 1 ? 'Nam' : 'Nữ' }}
                            </td>
                            <td class="py-4 text-center hidden sm:table-cell">
                                {{ $dt->YearOfBirth }}
                            </td>
                            <td class="py-4 text-center hidden sm:table-cell">
                                {{ $dt->Email }}
                            </td>
                            <td class="py-4 text-center hidden md:table-cell">
                                {{ $dt->Phone }}
                            </td>
                            <td class="text-center">
                                <button>
                                    <a href="{{ route('customers.show', $dt->CustomerId) }}">
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
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
