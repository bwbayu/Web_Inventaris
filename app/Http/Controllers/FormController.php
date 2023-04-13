<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show($slug)
    {
        $arr = explode("_", $slug);
        return view('form/' . $slug . "Form", [
            "user1" => "Admin",
            "user2" => "Karyawan",
            "title" => (count($arr) == 1) ? "Form " . $arr[0] : "Form " . $arr[0] . " " . $arr[1]
        ]);
    }
}
