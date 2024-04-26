@extends('admin.layout_admin.layout_admin')
@section('title', 'Dòng sản phẩm')
@section('content')
    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">DÒNG SẢN PHẨM</h1>
        </div>
        @if (@session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500 pb-3"
                role="alert">
                <p class="font-bold">THÀNH CÔNG</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="py-7 px-7">
            <form method="POST" action="{{ route('product_models.store') }}">
                @csrf
                <div class="w-full border rounded-lg p-3">
                    <div class="w-full block sm:flex">
                        <div class="mt-3 w-full sm:w-1/3 sm:mr-3">
                            <label for="product-type-id" class="block">Sản phẩm loại:</label>
                            <select name="ProductTypeId" id="product-type-id"
                                class="px-3 w-full h-10 border border-black rounded-lg">
                                <option selected disabled>Chọn loại</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->ProductTypeId }}">{{ $type->ProductTypeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 w-full sm:w-2/3">
                            <label for="product-model-name" class="block">Tên sản phẩm</label>
                            <input type="text" id="product-model-name" name="ProductModelName" value="" required
                                class="px-3 w-full h-10 border border-black rounded-lg">
                        </div>
                    </div>
                    <div class="flex justify-end my-3">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-32">Thêm</button>
                    </div>
            </form>
        </div>
        <table class="w-full mt-5 text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left w-2/6">
                        Tên loại sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3 text-center w-2/6">
                        Tên dòng sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3 text-right w-2/6">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 text-left">
                            {{ $dt->getProductTypeName->ProductTypeName }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $dt->ProductModelName }}
                        </td>
                        <td class="text-right">
                            <button>
                                <a href="{{ route('product_models.edit', $dt->ProductModelId) }}" class="w-1">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g id="Complete">
                                            <g id="edit">
                                                <g>
                                                    <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                        fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <polygon fill="none"
                                                        points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </button>
                            <form action="{{ route('product_models.destroy', $dt->ProductModelId) }}" method="post"
                                class="inline-block" id="deleteForm{{ $dt->ProductModelId }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" data-pm-id="{{ $dt->ProductModelId }}" class="delete-btn">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        //xử lý nút xóa
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const ProductModelId = this.getAttribute('data-pm-id');

                Swal.fire({
                    title: 'Xác nhận xóa',
                    html: `Bạn có chắc chắn muốn xóa dòng sản phẩm này này không?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const deleteForm = document.getElementById('deleteForm' + ProductModelId);
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
