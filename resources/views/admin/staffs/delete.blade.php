@extends('admin.layout_admin.layout_admin')
@section('title', 'Khóa tài khoản')
@section('content')
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="mb-5">
                <button type="button"
                    class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <a href="{{route('staffs.index')}}">Trở về</a>
                </button>
            </div>
            <div class="flex w-full justify-center mb-5">
                <h1 class="text-2xl font-semibold mb-4 text-red-600">BẠN MUỐN KHÓA TÀI KHOẢN NÀY?</h1>
            </div>
            <form action="{{route('staffs.block', $staff->StaffId)}}" method="post">
                <div class="flex justify-center w-full">
                    <div class="block w-1/2">
                        <div class="w-full bg-white shadow overflow-hidden sm:rounded-lg ">
                            <div class="w-full bg-white shadow">
                                <div class="border-t border-gray-200 py-5">
                                    <dl>
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="StaffPositionId" class="text-sm font-bold text-gray-500">Chức vụ
                                                nhân
                                                viên:</label>
                                            <input name="StaffPositionId" type="text" disabled
                                                value="{{ $staff->getStaffPositionName->StaffPositionName }}"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="StaffName" class="text-sm font-bold text-gray-500">Tên nhân viên:</label>
                                            <input name="StaffName" type="text" disabled value="{{ $staff->StaffName }}"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="Email" class="text-sm font-bold text-gray-500">Email nhân
                                                viên:</label>
                                            <input name="Email" type="text" disabled value="{{ $staff->Email }}"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="Phone" class="text-sm font-bold text-gray-500">Số điện thoại:</label>
                                            <input name="Phone" type="text" disabled value="{{ $staff->Phone }}"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="CitizenId" class="text-sm font-bold text-gray-500">Số CCCD:</label>
                                            <input name="CitizenId" type="text" disabled value="{{ $staff->CitizenId }}"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 pb-3 w-full flex justify-end">
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Xác nhận</button>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                        <a href="{{ route('staffs.index') }}">
                            Hủy
                        </a>
                    </button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
