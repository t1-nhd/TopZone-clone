@extends('admin.layout_admin.layout_admin')
@section('title', 'Thông tin nhân viên')
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
                    <a href="{{ route('staffs.index') }}">Trở về</a>
                </button>
            </div>
            <div class="flex w-full justify-center mb-5">
                <h1 class="text-2xl font-semibold mb-4">THÔNG TIN NHÂN VIÊN</h1>
            </div>
            <div class="flex justify-center w-full">
                <div class="block w-1/2">
                    <div class="w-full bg-white shadow overflow-hidden sm:rounded-lg ">
                        <div class="w-full bg-white shadow">
                            @if (Auth::user()->account_type == 2 && Auth::user()->email != $staff->Email)
                                <div class="flex justify-end">
                                    <form action="{{ route('staffs.update') }}" method="post">
                                        @csrf
                                        @if ($isActive)
                                            <input type="hidden" name="Active" value=0>
                                            <input type="hidden" name="Email" value="{{ $staff->Email }}">
                                            <button class="text-red-500 hover:text-red-700">Khóa</button>
                                        @else
                                            <input type="hidden" name="Active" value=0>
                                            <input type="hidden" name="Email" value="{{ $staff->Email }}">
                                            <button class="text-blue-500 hover:text-blue-700">Mở khóa</button>
                                        @endif
                                    </form>
                                </div>
                            @endif
                            <div class="border-t border-gray-200 py-5">
                                <dl>
                                    <div class="bg-white px-4 py-1 flex justify-between items-center">
                                        <label for="StaffPositionId" class="text-sm font-bold text-gray-500">Chức vụ
                                            nhân
                                            viên:</label>
                                        <input name="StaffPositionId" type="text" readonly
                                            value="{{ $staff->getStaffPositionName->StaffPositionName }}"
                                            class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                    </div>
                                    <div class="bg-white px-4 py-1 flex justify-between items-center">
                                        <label for="StaffName" class="text-sm font-bold text-gray-500">Tên nhân
                                            viên:</label>
                                        <input name="StaffName" type="text" readonly value="{{ $staff->StaffName }}"
                                            class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                    </div>
                                    <div class="bg-white px-4 py-1 flex justify-between items-center">
                                        <label for="Email" class="text-sm font-bold text-gray-500">Email nhân
                                            viên:</label>
                                        <input name="Email" type="text" readonly value="{{ $staff->Email }}"
                                            class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                    </div>
                                    @if ($new)
                                        <div class="bg-white px-4 py-1 flex justify-between items-center">
                                            <label for="Password" class="text-sm font-bold text-gray-500">Mật khẩu:</label>
                                            <input name="Password" type="text" readonly value="1234567890"
                                                class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                        </div>
                                    @endif
                                    <div class="bg-white px-4 py-1 flex justify-between items-center">
                                        <label for="Phone" class="text-sm font-bold text-gray-500">Số điện thoại:</label>
                                        <input name="Phone" type="text" readonly value="{{ $staff->Phone }}"
                                            class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                    </div>
                                    <div class="bg-white px-4 py-1 flex justify-between items-center">
                                        <label for="CitizenId" class="text-sm font-bold text-gray-500">Số CCCD:</label>
                                        <input name="CitizenId" type="text" readonly value="{{ $staff->CitizenId }}"
                                            class="px-3 h-10 mb-1 border-0 text-lg text-gray-900" />
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var phone = document.getElementById('phone');
        var citizen = document.getElementById('citizen-id');

        phone.oninvalid = function(event) {
            event.target.setCustomValidity('Số điện thoại không hợp lệ \n e.g. 086 776 9496');
        }
        citizen.oninvalid = function(event) {
            event.target.setCustomValidity('Số CCCD là một chuỗi gồm 12 số. \n e.g. 054202000526');
        }
    </script>
@endsection
