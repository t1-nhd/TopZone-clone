@extends('layout.login_layout')
@section('title', 'Đăng ký')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Đăng ký tài khoản mới
            </h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-4" action="{{ route('registration') }}" method="POST">
                @csrf
                <div class="flex">
                    <div class="w-2/3 mr-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Họ</label>
                        <input id="last-name" name="LastName" type="text" required
                            class="block w-full h-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="1/3">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Tên</label>
                        <input id="first-name" name="FirstName" type="text" required
                            class="block w-full h-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email địa chỉ</label>
                    <input id="email" name="Email" type="email" autocomplete="email" required
                        class="block w-full h-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if (session('email-exist'))
                    <div>
                        <div class="bg-red-100 border border-red-500 text-red-700 p-4 transition-opacity duration-500 pb-3">
                            <p>{{ session('email-exist') }}</p>
                        </div>
                    </div>
                @endif
                <div>
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại</label>
                    <input id="phone" name="Phone" type="text" autocomplete="email" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu</label>
                    <input id="password" name="Password" type="password" autocomplete="current-password" required
                        class="block w-full h-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div>
                    <label for="confirm-password" class="block text-sm font-medium leading-6 text-gray-900">Xác nhận mật
                        khẩu</label>
                    <input id="confirm-password" name="ConfirmPassword" type="password" autocomplete="current-password"
                        required
                        class="block w-full h-10 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('password')
                    <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
                        <div class="flex flex-col justify-center items-center">
                            <div class="text-xl font-bold">Thông báo!</div>
                            <div class="text-gray-600">{{ $message }}</div>
                        </div>
                    </div>
                @enderror
                @error('confirm')
                        <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
                            <div class="flex flex-col justify-center items-center">
                                <div class="text-xl font-bold">Thông báo!</div>
                                <div class="text-gray-600">{{ $message }}</div>
                            </div>
                        </div>
                    @enderror
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Đăng
                        ký</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Đã có tài khoản?
                <a href="{{ route('show-registration') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Đăng nhập</a>
            </p>
        </div>
    </div>
@endsection
