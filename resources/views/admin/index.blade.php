@extends('admin.layout_admin.layout_admin')
@section('title', 'Dashboard')

@section('content')
    @php
        $totalProduct = \App\Models\Product::count();
        $totalCustomer = \App\Models\Customer::count();
        $totalBill = \App\Models\Bill::count();
        $totalStaff = \App\Models\Staff::count();

        $stt = 0;
        $thanhTien = 0;
        $pending_bills = \App\Models\Bill::where('Status', 'Pending')->get();
        $pending_bills_count = \App\Models\Bill::where('Status', 'Pending')->count();
    @endphp
    @if (@session('update-success'))
        <div class="rounded-l-xl absolute bg-green-100 z-50 top-32 right-0 h-16 px-5 flex justify-center items-center">
            <button onclick="this.parentElement.style.display='none';" class="absolute top-0 right-2 text-green-700"><i
                    class="fa-solid fa-xmark"></i></button>
            <div class="text-green-700 font-bold text-wrap">
                {{ @session('update-success') }}
            </div>
        </div>
    @endif
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">THÔNG TIN NHANH</h3>
        <div class="mt-4 flex flex-wrap -mx-6">
            <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                <a href="{{ route('customers.index') }}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full w-[50px] h-[50px] flex justify-center items-center my-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalCustomer }}</h4>
                            <div class="text-gray-500"><b>KHÁCH HÀNG</b></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                <a href="{{ route('staffs.index') }}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full w-[50px] h-[50px] flex justify-center items-center my-4">
                            <i class="fa-solid fa-user-tie text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalStaff }}</h4>
                            <div class="text-gray-500"><b>NHÂN VIÊN</b></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                <a href="{{ route('products.index') }}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full w-[50px] h-[50px] flex justify-center items-center my-4">
                            <i class="fas fa-star text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProduct }}</h4>
                            <div class="text-gray-500"><b>SẢN PHẨM</b></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                <a href="{{ route('bills.index') }}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full w-[50px] h-[50px] flex justify-center items-center my-4">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalBill }}</h4>
                            <div class="text-gray-500"><b>HÓA ĐƠN</b></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @if ($pending_bills_count > 0)
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-2xl font-medium text-gray-700">CÁC ĐƠN HÀNG ĐANG CHỜ XỬ LÝ</h3>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-3">
                <thead>
                    <tr class="text-xs text-gray-700 uppercase bg-gray-200">
                        <th scope="col" class="py-3 text-center w-1/12">
                            Số hóa đơn
                        </th>
                        <th scope="col" class="py-3 text-center w-1/12">
                            Khách hàng
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Thời điểm thanh toán
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Địa điểm giao
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Ghi chú
                        </th>
                        <th scope="col" class="py-3 text-center w-3/12">
                            Thực hiện
                        </th>
                        <th scope="col" class="py-3 text-center w-1/12">
                            Giá trị đơn hàng
                        </th>
                    </tr>
                </thead>
                <tbody class="w-full">
                    @foreach ($pending_bills as $bill)
                        @php
                            $status = '';
                            // 'Pending','Approve','Reject','Cancel','Shipping','Done'
                            switch ($bill->Status) {
                                case 'Approve':
                                    $status = 'Đã xác nhận';
                                    break;
                                case 'Reject':
                                    $status = 'Đã từ chối';
                                    break;
                                case 'Cancel':
                                    $status = 'Bị khách hủy';
                                    break;
                                case 'Shipping':
                                    $status = 'Đang giao hàng';
                                    break;
                                case 'Done':
                                    $status = 'Hoàn thành';
                                    break;
                                default:
                                    $status = 'Chờ xử lý';
                                    break;
                            }
                        @endphp
                        <tr class="border-b bg-gray-100">
                            <td class="py-4 font-medium text-center text-blue-500 hover:text-blue-700">
                                <a href="{{ route('bills.show', $bill->BillId) }}">
                                    {{ $bill->BillId }}
                                </a>
                            </td>
                            <td class="py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                <a class="text-blue-500 hover:text-blue-700"
                                    href="{{ route('customers.show', $bill->CustomerId) }}">{{ $bill->CustomerId }}</a>
                            </td>
                            <td class="py-4 text-center">
                                {{ Carbon\Carbon::parse($bill->created_at)->format('H:i:s d/m/Y') }}
                            </td>
                            <td class="py-4 text-center">
                                {{ $bill->Address }}
                            </td>
                            <td class="py-4 text-center">
                                {{ $bill->Note }}
                            </td>
                            <td class="py-4 text-center flex justify-center space-x-1 text-white font-bold">
                                <form action="{{ route('bills.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="BillId" value="{{ $bill->BillId }}">
                                    <input type="hidden" name="Status" value="Approve">
                                    <button class="rounded-md p-2 border bg-green-500 hover:bg-green-700">Xác nhận</button>
                                </form>
                                <form action="{{ route('bills.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="BillId" value="{{ $bill->BillId }}">
                                    <input type="hidden" name="Status" value="Reject">
                                    <button class="rounded-md p-2 border bg-red-500 hover:bg-red-700">Từ chối</button>
                                </form>

                            </td>
                            <td class="py-4 text-center font-bold text-red-600">
                                {{ number_format($bill->TotalBill) . '₫' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
