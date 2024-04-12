@extends('admin.layout_admin.layout_admin')
@section('title', 'Dòng sản phẩm')
@section('content')
    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">DÒNG SẢN PHẨM</h1>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-auto px-2">
                <a href="{{ route('product_models.create') }}">Thêm dòng sản phẩm</a>
            </button>
        </div>
        <hr>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                                <a href="">
                                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 96 96"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g>
                                            <path d="M18,24H78a6,6,0,0,0,0-12H18a6,6,0,0,0,0,12Z" />
                                            <path d="M78,42H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                            <path d="M78,72H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                        </g>
                                    </svg>
                                </a>
                            </button>
                            <button>
                                <a href="" class="w-1">
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
                            <form action="{{route('product_models.destroy', $dt->ProductModelId)}}" method="post" class="inline-block" id="deleteForm{{ $dt->ProductModelId }}">
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
                                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
            button.addEventListener('click', function () {
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
