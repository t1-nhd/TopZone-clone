<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use App\Models\ProductImage;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = Product::all();
        $selected = [
            "search" => $request->search,
            "ram" => $request->FilterRam,
            "memory" => $request->FilterMemory,
            "unit-price" => $request->SortUnitPrice,
            "model" => $request->FilterProductModel
        ];
        $isFilter = false;
        if ($request->all()) $isFilter = true;

        $data = Product::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('ProductName', 'LIKE', "%{$request->input('search')}%");
            })
            ->when($request->filled('FilterRam'), function ($query) use ($request) {
                $query->where('Ram', $request->input('FilterRam'));
            })
            ->when($request->filled('FilterMemory'), function ($query) use ($request) {
                $query->where('Memory', $request->input('FilterMemory'));
            })
            ->when($request->filled('FilterProductModel'), function ($query) use ($request) {
                $query->where('ProductModelId', $request->input('FilterProductModel'));
            })
            ->when($request->filled('SortUnitPrice'), function ($query) use ($request) {
                $query->orderBy('UnitPrice', $request->input('SortUnitPrice'));
            })
            ->get();

        $ramList = ['4 GB', '6 GB', '8 GB', '16 GB', '18 GB', '36 GB'];
        $memoryList = ['64 GB', '128 GB', '256 GB', '512 GB', '1 TB'];
        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        return view('admin.products.index', [
            'data' => $data,
            'selected' => $selected,
            'search' => $request->search,
            'models' => $productModels,
            'ramList' => $ramList,
            'memoryList' => $memoryList,
            'isFilter' => $isFilter,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        $productTypes = ProductType::all();
        return view('admin.products.create', [
            'models' => $productModels,
            'types' => $productTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(StoreProductRequest $request)
    {
        $newProduct = new Product();

        $request->validated();

        $newProductModelId = ProductModel::where('ProductModelName', $request->ProductModelName)->first()->ProductModelId;
        $newProduct->ProductModelId = $newProductModelId;
        $productName = $request->ProductName . " " . $request->Memory;
        $newProduct->ProductName = $productName;
        $newProduct->Ram = $request->Ram;
        $newProduct->Memory = $request->Memory;
        $newProduct->DesignSizeAndWeight = $request->DesignSizeAndWeight;
        $newProduct->UnitPrice = $request->UnitPrice;
        $newProduct->Warranty = $request->Warranty;
        $newProduct->Inventory = $request->Inventory;
        $newProduct->isNew = $request->isNew;
        $newProduct->ShowOnHomePage = false;
        $newProduct->MonitorTechnology = $request->MonitorTechnology;
        $newProduct->Resolution = $request->Resolution;
        $newProduct->MonitorSize = $request->MonitorSize;
        $newProduct->CameraBack = $request->CameraBack;
        $newProduct->CameraFront = $request->CameraFront;
        $newProduct->Os = $request->Os;
        $newProduct->Cpu = $request->Cpu;
        $newProduct->CpuSpeed = $request->CpuSpeed;
        $newProduct->Gpu = $request->Gpu;
        $newProduct->Cellular = $request->Cellular;
        $newProduct->Sim = $request->Sim;
        $newProduct->Wireless = $request->Wireless;
        $newProduct->Port = $request->Port;
        $newProduct->Jack = $request->Jack;
        $newProduct->BatteryCapacity = $request->BatteryCapacity;
        $newProduct->BatteryType = $request->BatteryType;
        $newProduct->BatteryTechnology = $request->BatteryTechnology;
        $newProduct->NumberOfCore = $request->NumberOfCore;
        $newProduct->NumberOfThread = $request->NumberOfThread;
        $newProduct->SpecialFeature = $request->SpecialFeature;
        $newProduct->ChargerIncluded = $request->ChargerIncluded;
        $newProduct->MaximumChargable = $request->MaximumChargable;
        $newProduct->MaximumRamUpgraded = $request->MaximumRamUpgraded;
        $newProduct->MaximumCpuSpeed = $request->MaximumCpuSpeed;
        $newProduct->StrapReplaceable = $request->StrapReplaceable;
        $newProduct->SportSupport = $request->SportSupport;
        $newProduct->CallingSupport = $request->CallingSupport;
        $newProduct->MonitorMaterials = $request->MonitorMaterials;
        $newProduct->BorderMaterials = $request->BorderMaterials;
        $newProduct->StrapMaterials = $request->StrapMaterials;
        $newProduct->StrapWidth = $request->StrapWidth;
        $newProduct->StrapHeight = $request->StrapHeight;
        $newProduct->WaterResistant = $request->WaterResistant;
        $newProduct->Healthcare = $request->Healthcare;
        $newProduct->DisplayNotification = $request->DisplayNotification;
        $newProduct->ChargingTime = $request->ChargingTime;
        $newProduct->OsConnectable = $request->OsConnectable;
        $newProduct->ManagermentApplication = $request->ManagermentApplication;
        $newProduct->Sensor = $request->Sensor;
        $newProduct->Locater = $request->Locater;


        if ($request->hasFile('ProductThumbnail')) {
            $image = $request->file('ProductThumbnail');
            $imageName = str_replace('/','-',str_replace(' ', '-', strtolower($newProduct->ProductName)) . "." . $image->extension());

            $newProduct->ProductThumbnail = $imageName;

            $image->move(public_path('images\Thumbnails'), $imageName);
        }

        $result = $newProduct->save();
        // $result = Product::create($newProduct);

        if ($result) return redirect()->route('products.index')->with("success", "Thêm sản phẩm thành công!");
        else return redirect()->route('products.create')->with("fail", "Thêm sản phẩm không thành công!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productImages = ProductImage::where('ProductName', $product->ProductName)->get('ProductImage');
        return view('admin.products.show', [
            'product' => $product,
            'productImages' => $productImages
        ])->with('title', $product->ProductName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ramList = ['4 GB', '6 GB', '8 GB', '16 GB', '18 GB', '36 GB'];
        $memoryList = ['64 GB', '128 GB', '256 GB', '512 GB', '1 TB'];
        $warrantyList = ['3 tháng', '6 tháng', '12 tháng', '24 tháng'];
        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        $product = Product::find($id);
        return view('admin.products.edit', [
            'product' => $product, 'models' => $productModels,
            'ramList' => $ramList,
            'memoryList' => $memoryList,
            'warrantyList' => $warrantyList
        ])->with('title', $product->ProductName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('ProductThumbnail')) {
            $image = $request->file('ProductThumbnail');
            $imageName = str_replace('/','-',str_replace(' ', '-', strtolower($product->ProductName)) . "." . $image->extension());
            DB::table('products')->where('ProductId', $id)->update(['ProductThumbnail' => $imageName]);

            $image->move(public_path('images\Thumbnails'), $imageName);
        }
        $request->validated();
        DB::table('products')->where('ProductId', $id)->update([
            'ProductName' => $request->ProductName,
            'Ram' => $request->Ram,
            'DesignSizeAndWeight' => $request->DesignSizeAndWeight,
            'UnitPrice' => $request->UnitPrice,
            'Warranty' => $request->Warranty,
            'Inventory' => $request->Inventory,
            'isNew' => $request->isNew,
            'ShowOnHomePage' => $request->ShowOnHomePage,
            'MonitorTechnology' => $request->MonitorTechnology,
            'Resolution' => $request->Resolution,
            'MonitorSize' => $request->MonitorSize,
            'CameraBack' => $request->CameraBack,
            'CameraFront' => $request->CameraFront,
            'Os' => $request->Os,
            'Cpu' => $request->Cpu,
            'CpuSpeed' => $request->CpuSpeed,
            'Gpu' => $request->Gpu,
            'Cellular' => $request->Cellular,
            'Sim' => $request->Sim,
            'Wireless' => $request->Wireless,
            'Port' => $request->Port,
            'Jack' => $request->Jack,
            'BatteryCapacity' => $request->BatteryCapacity,
            'BatteryType' => $request->BatteryType,
            'BatteryTechnology' => $request->BatteryTechnology,
            'NumberOfCore' => $request->NumberOfCore,
            'NumberOfThread' => $request->NumberOfThread,
            'SpecialFeature' => $request->SpecialFeature,
            'ChargerIncluded' => $request->ChargerIncluded,
            'MaximumChargable' => $request->MaximumChargable,
            'MaximumRamUpgraded' => $request->MaximumRamUpgraded,
            'MaximumCpuSpeed' => $request->MaximumCpuSpeed,
            'StrapReplaceable' => $request->StrapReplaceable,
            'SportSupport' => $request->SportSupport,
            'CallingSupport' => $request->CallingSupport,
            'MonitorMaterials' => $request->MonitorMaterials,
            'BorderMaterials' => $request->BorderMaterials,
            'StrapMaterials' => $request->StrapMaterials,
            'StrapWidth' => $request->StrapWidth,
            'StrapHeight' => $request->StrapHeight,
            'WaterResistant' => $request->WaterResistant,
            'Healthcare' => $request->Healthcare,
            'DisplayNotification' => $request->DisplayNotification,
            'ChargingTime' => $request->ChargingTime,
            'OsConnectable' => $request->OsConnectable,
            'ManagermentApplication' => $request->ManagermentApplication,
            'Sensor' => $request->Sensor,
            'Locater' => $request->Locater,
        ]);

        return redirect()->route('products.show', $product->ProductId)->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete', ['product' => $product]);
    }

    public function destroy($id)
    {
        $result = Product::query()->where('ProductId', $id)->delete();
        if ($result) return redirect()->route('products.index')->with('success', 'Xóa thành công');
        return redirect()->route('products.index')->with('fail', 'Xóa không thành công');
    }

    public function showImport(Request $request)
    {
        $products = Product::all('ProductId','ProductName', 'Inventory', 'ProductThumbnail');
        return $products;
        
        $isFilter = false;
        if ($request->all()) $isFilter = true;

        $selected = $request->FilterProductModel;

        $products = Product::query()
            ->when($request->filled('FilterProductModel'), function ($query) use ($request) {
                $query->where('ProductModelId', $request->input('FilterProductModel'));
            })
            ->get('ProductId','ProductName', 'Inventory', 'ProductThumbnail');

        $productModels = ProductModel::orderBy('ProductModelName', 'asc')->get();
        
        return view('admin.products.import',[
            'data' => $products,
            'isFilter' => $isFilter,
            'selected' => $selected,
            'models' => $productModels,
        ]);
    }
    public function import(Request $request){
        //
    }
}
