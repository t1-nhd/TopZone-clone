@extends('layout.layout_profile')
@section('title', 'Hồ sơ của bạn')
@section('content')
    @php
        $stt_bill = 0;
        $stt = 0;
        $thanhTien = 0;
    @endphp
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
                    <div class="bg-white shadow rounded-lg p-6 h-full">
                        <div class="overflow-x-auto">
                            <div class="mb-3">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <thead>
                                        <tr class="text-xs text-gray-700 uppercase bg-gray-100">
                                            <th scope="col" class="py-3 text-center w-1/12">
                                                STT
                                            </th>
                                            <th scope="col" class="py-3 text-center w-2/12">
                                                Thời điểm thanh toán
                                            </th>
                                            <th scope="col" class="py-3 text-center w-3/12">
                                                Địa điểm giao
                                            </th>
                                            <th scope="col" class="py-3 text-center w-2/12 overflow-hidden">
                                                Ghi chú
                                            </th>
                                            <th scope="col" class="py-3 text-center w-2/12">
                                                Trạng thái
                                            </th>
                                            <th scope="col" class="py-3 text-center w-2/12">
                                                Giá trị đơn hàng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="w-full">
                                        @foreach ($bills as $bill)
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
                                                        $status = 'Đang xử lý';
                                                        break;
                                                }
                                            @endphp
                                            <tr class="collapsible border-b bg-gray-50">
                                                <td class="py-4 font-medium text-gray-900 text-center">
                                                    {{ ++$stt_bill }}
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
                                                <td class="py-4 text-center font-bold">
                                                    {{ $status }}
                                                </td>
                                                <td class="py-4 text-center font-bold text-red-600">
                                                    {{ number_format($bill->TotalBill) . '₫' }}
                                                </td>
                                            </tr>
                                            <tr class="hidden border-b">
                                                <td colspan="7">
                                                    @php
                                                        $details = Illuminate\Support\Facades\DB::table('bill_details')
                                                            ->join(
                                                                'products',
                                                                'bill_details.ProductId',
                                                                '=',
                                                                'products.ProductId',
                                                            )
                                                            ->where('BillId', $bill->BillId)
                                                            ->get();
                                                    @endphp
                                                    @foreach ($details as $detail)
                                                        @php
                                                            $thanhTien += $detail->Quantity * $detail->UnitPrice;
                                                        @endphp
                                                        <div class="grid grid-cols-12 gap-5 py-2">
                                                            <div class="text-end col-span-1">{{ ++$stt }}</div>
                                                            <div class="col-span-3 font-bold">
                                                                {{ $detail->ProductName }}
                                                            </div>
                                                            <div class="col-span-2">
                                                                {{ $detail->Memory }}
                                                            </div>
                                                            <div class="text-center col-span-2">
                                                                ×{{ $detail->Quantity }}
                                                            </div>
                                                            <div class="text-center col-span-2">
                                                                {{ number_format($detail->UnitPrice) . '₫' }}
                                                            </div>
                                                            <div class="col-span-2 text-center text-red-500">
                                                                {{ number_format($thanhTien) . '₫' }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    </script>
@endsection
