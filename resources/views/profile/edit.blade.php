@extends('layout.layout_profile')
@section('title', 'Hồ sơ của bạn')
@section('content')
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="w-full flex px-4">
                <div class="w-1/3 sm:mr-3 h-full ">
                    <div class="bg-white shadow rounded-lg p-6 h-full">
                        <div class="flex flex-col items-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                            </img>
                            <h1 class="text-xl font-bold">{{ $customer->LastName . ' ' . $customer->FirstName }}</h1>
                            <p class="text-gray-700">{{ Auth::user()->email }}</p>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <div class="flex justify-between">
                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Thông tin cá nhân</span>
                                <a href="{{ route('profile.edit', Auth::user()->email) }}">
                                    <i class="fa-solid fa-pen text-gray-700 text-sm"></i>
                                </a>
                            </div>
                            <ul class="grid grid-cols-2">
                                <li class="mb-2 font-bold">Số điện thoại:</li>
                                <li class="mb-2">
                                    {{ $customer->Phone }}
                                </li>
                                <li class="mb-2 font-bold">Địa chỉ:</li>
                                <li class="mb-2">
                                    {{ $customer->Address != null ? $customer->Address : 'Chưa có' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 h-full">
                    <div class="bg-white shadow rounded-lg p-6 h-full w-full">
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            <div class="flex px-4">
                                <div class="bg-white py-2 w-2/3 flex-col">
                                    <label for="LastName" class="text-sm font-bold text-gray-500">Họ của bạn</label>
                                    <input name="LastName" type="text" required value="{{ $customer->LastName }}"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                                </div>
                                <div class="bg-white py-2 ml-1 w-1/3 flex-col">
                                    <label for="FirstName" class="text-sm font-bold text-gray-500">Tên của bạn</label>
                                    <input name="FirstName" type="text" required value="{{ $customer->FirstName }}"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                                </div>
                            </div>
                            <div class="bg-white px-4 py-2 w-full flex-col">
                                <label for="Phone" class="text-sm font-bold text-gray-500">Số điện thoại</label>
                                <input name="Phone" type="text" pattern="[0-9]{10}" required
                                    value="{{ $customer->Phone }}"
                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                            </div>
                            <div class="bg-white px-4 py-2 w-full flex-col">
                                <label for="Address" class="text-sm font-bold text-gray-500">Địa chỉ <i
                                        class="font-normal">(sử dụng khi giao hàng)</i></label>
                                <input name="Address" type="text" value="{{ $customer->Address }}"
                                    placeholder="Thêm địa chỉ giao hàng"
                                    class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                            </div>
                            <hr>
                            <div class="bg-white px-4 w-full pt-10 pb-3 flex items-center">
                                <label for="ChangePassword" class="text-sm font-bold text-gray-500">Thay đổi mật
                                    khẩu</label>
                                <input name="ChangePassword" type="checkbox" id="isChangePassword"
                                    onchange="onChangePassword()" class="mt-1 ml-1 h-4 w-4" />
                            </div>
                            <div id="password_change_input" class="hidden px-4">
                                <div class="bg-white w-1/2 flex-col">
                                    <label for="OldPassword" class="text-sm font-bold text-gray-500">Mật khẩu cũ</label>
                                    <input name="OldPassword" type="password" id="old"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                                </div>
                                <div class="bg-white w-1/2 flex-col">
                                    <label for="NewPassword" class="text-sm font-bold text-gray-500">Mật khẩu mới</label>
                                    <input name="NewPassword" type="password" id="new"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                                </div>
                                <div class="bg-white w-1/2 flex-col">
                                    <label for="ConfirmPassword" class="text-sm font-bold text-gray-500">Xác minh mật
                                        khẩu</label>
                                    <input name="ConfirmPassword" type="password" id="confirm"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-4" />
                                </div>
                            </div>
                            <div class="bg-white w-full flex justify-center space-x-1">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded-lg px-3">
                                    Cập nhật
                                </button>
                                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold h-9 rounded-lg px-3">
                                    <a href="{{route('profile')}}">Hủy</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");

        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "table-row") {
                    content.style.display = "none";
                } else {
                    content.style.display = "table-row";
                }
            });
        }

        var isChangePassword = document.getElementById('isChangePassword');
        var password_change_input = document.getElementById('password_change_input');
        var old = document.getElementById('old');
        var _new = document.getElementById('new');
        var confirm = document.getElementById('confirm');

        function onChangePassword() {
            if (isChangePassword.checked == true) {
                password_change_input.style.display = 'block';
                old.required = true;
                _new.required = true;
                confirm.required = true;
            } else {
                password_change_input.style.display = 'none';
                old.required = false;
                _new.required = false;
                confirm.required = false;
            }
        }
    </script>
@endsection
