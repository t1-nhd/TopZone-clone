<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\StaffPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $positionList = StaffPosition::all();
        $staff = Staff::all();

        $isFilter = false;
        if($request->all()) $isFilter = true;

        $selected = [
            "filter-position" => $request->FilterStaffPosition,
            "orderBy" => $request->FilterStaffId,
        ];
        $staff = Staff::query()
            ->when($request->filled('FilterStaffPosition'), function ($query) use ($request) {
                $query->where('StaffPositionId', $request->input('FilterStaffPosition'));
            })
            ->when($request->filled('FilterStaffId'), function ($query) use ($request) {
                $query->orderBy('StaffId', $request->input('FilterStaffId'));
            })
            ->get();

        return view('admin.staffs.index', [
            'data' => $staff,
            'positions' => $positionList,
            'selected' => $selected,
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
        $yearOfBirth = range(2024 - 40, 2024 - 18);
        $positionList = StaffPosition::all();

        return view('admin.staffs.create', [
            'positions' => $positionList,
            'years' => $yearOfBirth,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        $request->validated();
        // Kiểm tra số CCCD
        if (Staff::where('CitizenId', $request->CitizenId)->exists()) {
            return redirect()->route('staffs.create')->with('citizen-id', 'Một nhân viên đã sử dụng số CCCD này, vui lòng xác nhận lại danh tính');
        }

        $staffName = $request->StaffLastName . " " . $request->StaffFirstName;

        // Tự động tạo email mới
        $words = explode(' ', $request->StaffLastName);
        $firstChar = '';
        foreach ($words as $word) {
            $firstChar .= mb_substr($word, 0, 1, 'UTF-8');
        }
        $email = Str::ascii(mb_strtolower($request->StaffFirstName)) . mb_strtolower($firstChar, 'UTF-8');
        if (User::where('email', $email . "@gmail.com")->exists()) {
            $count = User::where('email', 'LIKE', "{$email}%")->count();
            $email .= $count . "@gmail.com";
        } else $email .= "@gmail.com";
        $newPassword = "1234567890";

        $user = new User();
        $user->email = $email;
        $user->password = Hash::make($newPassword);
        $user->account_type = 1;
        $user->name = $request->StaffFirstName;
        $user->save();

        $staff = new Staff();
        $staff->StaffPositionId = $request->StaffPositionId;
        $staff->StaffName = $staffName;
        $staff->Email = $email;
        $staff->Gender = $request->Gender;
        $staff->YearOfBirth = $request->YearOfBirth;
        $staff->Phone = $request->Phone;
        $staff->CitizenId = $request->CitizenId;
        $staff->save();

        return redirect()->route('staffs.index')->with('success', 'Thêm mới nhân viên thành công! Kiểm tra lại thông tin dưới đây');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($email, $new = false)
    {
        $staff = Staff::where('Email', $email)->first();
        $user = DB::table('users')->where('Email', $email)->first();
        $active = $user->active;
        return view('admin.staffs.show',[
            'staff' => $staff,
            'new' => $new,
            'isActive' => $active
        ]);
    }

    public function update(Request $request){
        DB::table('users')->where('email', $request->Email)->update([
            'active' => $request->Active
        ]);
        return redirect()->route('staffs.index')->with('block-success', 'Khóa tài khoản thành công');
    }
}
