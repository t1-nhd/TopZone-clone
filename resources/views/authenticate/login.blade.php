@extends('layout.layout_login')
@section('title', 'Đăng nhập')
@section('content')
<div class="w-screen h-screen bg-gradient-to-b from-black to-gray-400 flex flex-col justify-center">
    <div class="flex justify-center">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 w-full mx-6 md:mx-0 md:w-[500px] lg:px-8 bg-gray-100 rounded-lg shadow-md">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Đăng nhập
                </h2>
            </div>
            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email đăng nhập</label>
                        <input id="email" name="Email" type="email" autocomplete="email" required value="{{ session('email') }}"
                            class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu</label>
                        <input id="password" name="Password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div>
                        <button type="submit"
                            class="flex my-10 w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Đăng
                            nhập</button>
                    </div>
                </form>
                @if (session('login-failed'))
                    <div id="alert">
                        <div class="bg-red-100 border border-red-500 text-red-700 rounded-md p-4 transition-opacity duration-500 pb-3">
                            <p>{{ session('login-failed') }}</p>
                        </div>
                    </div>
                @endif
                @if (session('register-successfully'))
                    <div id="alert">
                        <div class="bg-green-100 border border-green-500 text-green-700 rounded-md p-4 transition-opacity duration-500 pb-3">
                            <p>{{ session('register-successfully') }}</p>
                        </div>
                    </div>
                @endif
    
                <p class="mt-10 text-center text-sm text-gray-500">
                    Chưa có tài khoản? <br>
                    <a href="{{ route('show-registration') }}"
                        class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Trở thành thành viên của TopZONE
                        tại đây!</a>
                </p>
            </div>
        </div>
    </div>
</div>
    
@endsection
