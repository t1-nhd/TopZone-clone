@extends('admin.layout_admin.layout_admin')
@section('title', 'Thêm sản phẩm')

@section('content')
    <div>
        <div class="overflow-x-auto m-10">
            <button type="button"
                class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>
                <a href="{{route('products.index')}}">Go back</a>
            </button>
            <h1 class="w-full text-4xl text-center mb-3">THÊM SẢN PHẨM</h1>
        </div>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="w-1/3 ml-20">
                <div class="mt-3">
                    <label for="product-model-name" class="block">Model thiết bị</label>
                    <div class="w-full flex">
                        <select name="ProductModelName" id="product-model-name"
                            class="px-3 w-full h-10 border border-black rounded-tl-lg rounded-bl-lg">
                            <option selected disabled>Chọn model máy</option>
                            @foreach ($models as $model)
                                <option value="{{ $model->ProductModelName }}">{{ $model->ProductModelName }}</option>
                            @endforeach
                        </select>
                        <button type="button"
                            class="bg-green-500 rounded-tr-lg border border-green-500 rounded-br-lg hover:bg-green-600 text-white font-bold h-10 w-36 px-2"
                            data-modal-target="product-model-create-modal" data-modal-toggle="product-model-create-modal">
                            <a href="{{ route('product_models.create') }}">Thêm mẫu</a>
                        </button>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="product-name" class="block">Tên sản phẩm</label>
                    <input type="text" id="product-name" name="ProductName" value="" required
                        class="px-3 w-full h-10 border border-black rounded-lg">
                </div>
                <div class="mt-3">
                    <label for="thumbnail" class="block">Thumbnail sản phẩm</label>
                    <div id="thumbnail" class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or WEBP</p>
                            </div>
                            <input id="dropzone-file" type="file" name="ProductThumbnail" class="hidden" />
                        </label>

                    </div>

                </div>
                <div class="mt-3 flex">
                    <div class="w-1/2 mr-1">
                        <label for="memory" class="block">Bộ nhớ trong:</label>
                        <select name="Memory" id="memory" class="px-3 w-full h-10 border border-black rounded-lg" required>
                            <option selected disabled>Chọn dung lượng bộ nhớ</option>
                            <option value="64 GB">64 GB</option>
                            <option value="128 GB">128 GB</option>
                            <option value="256 GB">256 GB</option>
                            <option value="512 GB">512 GB</option>
                            <option value="1 TB">1 TB</option>
                        </select>
                    </div>
                    <div class="w-1/2 ml-1">
                        <label for="ram" class="block">RAM:</label>
                        <select name="Ram" id="ram" class="px-3 w-full h-10 border border-black rounded-lg" required>
                            <option selected disabled>Chọn dung lượng RAM</option>
                            <option value="4 GB">4 GB</option>
                            <option value="6 GB">6 GB</option>
                            <option value="8 GB">8 GB</option>
                            <option value="16 GB">16 GB</option>
                            <option value="18 GB">18 GB</option>
                            <option value="36 GB">36 GB</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="unit-price" class="block">Đơn giá:</label>
                    <div class="w-full relative">
                        <input type="number" id="unit-price" name="UnitPrice" min="0"
                            class="block px-3 w-full h-10 border border-black rounded-lg" placeholder="" required />
                        <div class="absolute inset-y-0 end-10 flex items-center ps-3 pointer-events-none">
                            VNĐ
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="design-size-and-weight" class="block">Kích thước và trọng lượng:</label>
                    <textarea name="DesignSizeAndWeight" id="design-size-and-weight" rows="3"
                        class="pt-1 px-3 w-full border border-black rounded-lg" required></textarea>
                </div>

                <div class="mt-3">
                    <label for="warrenty" class="block">Bảo hành:</label>
                    <select name="Warrenty" id="warrenty" class="px-3 w-full h-10 border border-black rounded-lg">
                        <option value="12 tháng">3 tháng</option>
                        <option value="12 tháng">6 tháng</option>
                        <option value="12 tháng">12 tháng</option>
                        <option value="24 tháng">24 tháng</option>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="inventory" class="block">Nhập kho:</label>
                    <input type="number" id="inventory" name="Inventory" value="1" min="1" required
                        class="px-3 w-full h-10 border border-black rounded-lg">
                </div>

                <div class="mt-3">
                    <label for="is-new" class="flex">Mới ra mắt:</label>
                    <input type="checkbox" id="is-new" name="isNew" value="1"
                        class="form-checkbox h-5 w-5 text-indigo-600">
                </div>

                <div class="mt-3 pb-3">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-20">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('product-model-name').addEventListener('change', function() {
            var ramSelection = document.getElementById('ram');
            var productName = document.getElementById('product-name')

            productName.value = this.value + " ";

            if (this.value.includes('Watch')) {
                ramSelection.disabled = true;
            } else {    
                ramSelection.disabled = false;
            }
        });
    </script>
@endsection
