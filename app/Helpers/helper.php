<?php

use App\Models\Hotel;
use App\Models\Country;
use App\Models\Department;


function admin() {
    return Auth::guard('admin')->user();
}

function resturantManager() {
    return Auth::guard('resturant_manager')->user();
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
