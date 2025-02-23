<?php

namespace App\Http\Controllers;

use App\Models\Brochure;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function data_brosur(){
        $brochures = Brochure::all();
        return view('frontend.pages.halamandownload',compact('brochures'));
    }
}
