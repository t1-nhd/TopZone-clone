@extends('admin.layout_admin.layout_admin')
@section('title', 'Thêm nhân viên')
@section('content')

    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="flex w-full justify-center mb-5">
                <h1 class="text-2xl font-semibold mb-4">THÊM MỚI NHÂN VIÊN</h1>
            </div>
            <form action="{{route('staffs.store')}}" method="post">
                @csrf
                <div class="flex justify-center w-full">
                    <div class="block w-1/2">
                        <div class="w-full bg-white shadow overflow-hidden sm:rounded-lg ">
                            <div class="w-full bg-white shadow">
                                <div class="border-t border-gray-200 py-5">
                                    <dl>
                                        <div class="bg-white px-4 py-1 block">
                                            <label for="StaffPositionId" class="text-sm font-bold text-gray-500">Chức vụ
                                                nhân
                                                viên<i class="text-red-500">*</i></label>
                                            <div class="w-full flex sm:col-span-2">
                                                <select name="StaffPositionId" id="staff-position-name" required
                                                    class="px-3 h-10 mb-1 w-full border border-black rounded-lg text-sm text-gray-900">
                                                    <option selected disabled value="">Chọn chức vụ nhân viên</option>
                                                    @foreach ($positions as $position)
                                                        <option value="{{ $position->StaffPositionId }}">
                                                            {{ $position->StaffPositionName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex w-full px-4 py-1">
                                            <div class="bg-gray-50 w-1/2 pr-2 block">
                                                <label for="StaffLastName" class="text-sm font-bold text-gray-500">Họ nhân
                                                    viên<i class="text-red-500">*</i></label>
                                                <input name="StaffLastName" type="text" id="product-name" required
                                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                            </div>
                                            <div class="bg-gray-50 w-1/2 block">
                                                <label for="StaffFirstName" class="text-sm font-bold text-gray-500">Tên nhân
                                                    viên<i class="text-red-500">*</i></label>
                                                <input name="StaffFirstName" type="text" id="product-name" required
                                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                            </div>
                                        </div>
                                        <div class="flex w-full px-4 py-1">
                                            <div class="bg-gray-50 w-1/2 pr-2 block">
                                                <label for="gender" class="text-sm font-bold text-gray-500">Giới
                                                    tính<i class="text-red-500">*</i></label>
                                                <select name="Gender" id="gender" required
                                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                                    <option value="" selected disabled>Chọn giới tính</option>
                                                    <option value=1>Nam</option>
                                                    <option value=0>Nữ</option>
                                                </select>
                                            </div>
                                            <div class="bg-gray-50 w-1/2 block">
                                                <label for="YearOfBirth" class="text-sm font-bold text-gray-500">Năm
                                                    sinh<i class="text-red-500">*</i></label>
                                                <div class="w-full sm:col-span-2 relative">
                                                    <select name="YearOfBirth" required
                                                        class="px-3 h-10 mb-1 w-full border border-black rounded-lg text-sm text-gray-900">
                                                        <option  value="" selected disabled>Chọn năm sinh</option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex w-full px-4 py-1">
                                            <div class="bg-gray-50 w-1/2 pr-2 block">
                                                <label for="Phone" class="text-sm font-bold text-gray-500">Số điện
                                                    thoại<i class="text-red-500">*</i></label>
                                                <input name="Phone" type="text" id="phone" required
                                                    pattern="[0-9]{10}"
                                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                            </div>
                                            <div class="bg-gray-50 w-1/2 block">
                                                <label for="CitizenId" class="text-sm font-bold text-gray-500">Số
                                                    CCCD<i class="text-red-500">*</i></label>
                                                <input name="CitizenId" type="text" id="citizen-id" required
                                                    pattern="[0-9]{12}"
                                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                            </div>
                                        </div>
                                        @if (session('citizen-id'))
                                            <div id="alert"
                                                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mx-3 transition-opacity duration-500"
                                                role="alert">
                                                <p>{{ session('citizen-id') }}</p>
                                            </div>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 pb-3 w-full flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Thêm</button>
                            <button type="button"
                                class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                                <a href="{{ route('products.index') }}">
                                    Hủy
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
