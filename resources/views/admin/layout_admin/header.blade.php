<nav class="bg-black border-gray-200 sticky w-full top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('admin.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ URL('images/logo-video.png') }}" class="h-8" alt="TopZone logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" onclick="onHandleClick()"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-black md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li class="group">
                    <a href="{{ route('products.index') }}"
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        aria-current="page">Sản phẩm</a>
                    <div
                        class="invisible absolute z-50 flex w-auto flex-col bg-gray-100 border rounded-sm text-gray-800 group-hover:visible">
                        <div class="hover:bg-slate-300 w-full h-full">
                            <a href="{{ route('product_types.index') }}"
                                class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2">Loại sản
                                phẩm</a>
                        </div>
                        <div class="hover:bg-slate-300 w-full h-full">
                            <a href="{{ route('product_models.index') }}"
                                class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2">Dòng sản
                                phẩm</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('product_images.index') }}"
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Thư
                        viện ảnh</a>
                </li>
                <li>
                    <a href="{{route('customers.index')}}"
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Khách
                        Hàng</a>
                </li>
                <li>
                    <a href="{{route('staffs.index')}}"
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Nhân
                        viên</a>
                </li>
                <li>
                    <a href="{{route('bills.index')}}"
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Hóa đơn</a>
                </li>
                <li class="group">
                    <a href=""
                        class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><i
                            class="fa-solid fa-user mr-1"></i>{{ Auth::user()->name }}</a>
                    <div
                        class="invisible absolute z-50 flex w-auto flex-col bg-gray-100 border rounded-sm text-gray-800 group-hover:visible">
                        <div class="hover:bg-slate-300 w-full h-full">
                            <a href="{{ route('logout') }}"
                                class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2"><i
                                    class="fa-solid fa-arrow-right-from-bracket mr-1"></i>Đăng xuất</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
