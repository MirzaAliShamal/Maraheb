<?php

use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\Department;
use App\Models\Specialisation;
use App\Models\ResturantDepartment;


function admin() {
    return Auth::guard('admin')->user();
}

function recruiter() {
    return Auth::guard('recruiter')->user();
}

function purchaseManager() {
    return Auth::guard('purchase_manager')->user();
}

function generateNumericOTP($n) {
    $generator = "1357902468";

    $result = "";

    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
}

function hidePhone($val) {
    $last_digits = substr($val,-4);
    $length = strlen($val);
    $hidden_len = $length - 4;

    $hidden_str = '';

    for ($i=0; $i < $hidden_len ; $i++) {
        $hidden_str .= '*';
    }

    return $hidden_str.$last_digits;
}

function countries() {
    return Country::orderBy('name', 'ASC')->get();
}

function hotels() {
    return Hotel::whereStatus(true)->orderBy('name', 'ASC')->get();
}

function departments() {
    return Department::whereStatus(true)->orderBy('name', 'ASC')->get();
}

function specialisations() {
    return Specialisation::whereStatus(true)->orderBy('name', 'ASC')->get();
}

function checkResturantDepts($resturant, $department) {
    $exists = ResturantDepartment::where('resturant_id', $resturant)
        ->where('department_id', $department)
        ->exists();

    if ($exists) {
        return true;
    } else {
        return false;
    }
}

function checkResturantDeptHourly($resturant, $department) {
    $res = ResturantDepartment::where('resturant_id', $resturant)
        ->where('department_id', $department)
        ->first();

    if (is_null($res)) {
        return 0;
    } else {
        return $res->rate;
    }
}

function generateDateRange(Carbon $start_date, Carbon $end_date) {
    $dates = [];

    for($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
        $dates[] = $date->format('Y-m-d');
    }

    return $dates;
}
