@extends('admin.layout_admin.layout_admin')
@section('title', 'Hóa đơn')
@section('content')

    @php
        $stt = 0;
        $tongTien = 0;
    @endphp
    @if (@session('update-success'))
        <div class="rounded-l-xl absolute bg-green-100 z-50 top-32 right-0 h-16 px-5 flex justify-center items-center">
            <button onclick="this.parentElement.style.display='none';" class="absolute top-0 right-2 text-green-700"><i class="fa-solid fa-xmark"></i></button>
            <div class="text-green-700 font-bold text-wrap">
                {{ @session('update-success') }}
            </div>
        </div>
    @endif
    <div class="w-1/2 px-7 flex justify-center">
        <a href="javascript:history.back()" class="text-blue-500 hover:text-blue-700">
            ← Trở về
        </a>
    </div>
    <div class="w-full flex justify-center">
        <div class="w-1/2 bg-gray-100 px-7 py-5 rounded-lg">
            <h1 class="w-full text-3xl text-center font-semibold">
                CHI TIẾT HÓA ĐƠN {{ $bill->BillId }}
            </h1>
            <h5 class="w-full text-center mb-6 italic">
                {{ Carbon\Carbon::parse($bill->created_at)->format('H:i:s d/m/Y') }}
            </h5>
            <div>
                <div class="font-bold text-lg">Thông tin người nhận</div>
                <div class="grid grid-cols-3 py-2">
                    <div class="mt-3 font-semibold">Tên khách hàng:</div>
                    <div class="mt-3 col-span-2">{{ $customer->LastName . ' ' . $customer->FirstName }}</div>
                    <div class="mt-3 font-semibold">Số điện thoại:</div>
                    <div class="mt-3 col-span-2">{{ $bill->Phone }}</div>
                    <div class="mt-3 font-semibold">Địa chỉ giao hàng:</div>
                    <div class="mt-3 col-span-2">{{ $bill->Address }}</div>
                    <div class="mt-3 font-semibold">Trạng thái đơn hàng:</div>
                    <div class="mt-3 col-span-2">
                        <form action="{{ route('bills.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="BillId" value="{{ $bill->BillId }}">
                            <div class="flex w-full">
                                <select name="Status" id="status-select" class="h-8 pl-1 rounded-md"
                                    onchange="statusOnChange()">
                                    @foreach ($status as $item)
                                        @php
                                            $status = '';
                                            switch ($item) {
                                                case 'Approve':
                                                    $status = 'Đã nhận đơn';
                                                    break;
                                                case 'Reject':
                                                    $status = 'Từ chối đơn';
                                                    break;
                                                case 'Shipping':
                                                    $status = 'Đang giao hàng';
                                                    break;
                                                default:
                                                    $status = 'Chờ xử lý';
                                                    break;
                                            }
                                        @endphp
                                        <option value="{{ $item }}" {{ $item == $bill->Status ? 'selected' : '' }}>
                                            {{ $status }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" id="bt-update"
                                    class="invisible px-2 ml-1 border border-blue-500 rounded-lg h-8 bg-blue-500 hover:bg-blue-700 hover:border-blue-700 text-white">Cập
                                    nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <div class="font-bold py-3 text-lg">Đơn hàng</div>
            <div class="flex justify-center w-full">
                <table class="w-full border border-gray-200">
                    <thead class="bg-gray-200">
                        <th scope="col" class="py-3 text-center w-1/12">
                            STT
                        </th>
                        <th scope="col" class="py-3 text-center w-4/12">
                            Tên sản phẩm
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Dung lượng
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Đơn giá
                        </th>
                        <th scope="col" class="py-3 text-center w-3/12">
                            Thành tiền
                        </th>
                    </thead>
                    <tbody class="bg-gray-50">
                        @foreach ($details as $detail)
                            <tr>
                                <td class="py-4 font-medium text-gray-900 text-center">
                                    {{ ++$stt }}
                                </td>
                                <td class="py-4 text-gray-900">
                                    {{ $detail->Quantity . ' × ' . $detail->ProductName }}
                                </td>
                                <td class="py-4 text-gray-900 text-center">
                                    {{ $detail->Memory }}
                                </td>
                                <td class="py-4 text-gray-900 text-center">
                                    {{ number_format($detail->UnitPrice) }}₫
                                </td>
                                <td class="py-4 text-gray-900 text-center">
                                    {{ number_format($detail->Quantity * $detail->UnitPrice) }}₫
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full flex justify-end m-4">
                <div>Tổng hóa đơn:</div>
                <div class="font-bold mx-4">
                    {{ number_format($bill->TotalBill) }}₫
                </div>
            </div>
        </div>
    </div>

    <script>
        function statusOnChange() {
            document.getElementById('bt-update').style.visibility = "visible";
        }
    </script>
@endsection
