<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

// Get semua data


class IndoregionController extends Controller
{
    public function index(){
        $provinces = Province::all();
        return view('test',compact('provinces'));
    }

    public function getkabupaten(Request $request){
        $id_provinsi = $request->id_provinsi;

        $kabupaten = Regency::where('province_id',$id_provinsi)->get();
        foreach($kabupaten as $kabupaten) {
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }
    public function getkecamatan(Request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatan = District::where('regency_id',$id_kabupaten)->get();
        foreach($kecamatan as $kecamatan) {
            echo "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
    }
    public function getdesa(Request $request){
        $id_kecamatan = $request->id_kecamatan;

        $desa = Village::where('district_id',$id_kecamatan)->get();
        foreach($desa as $desa) {
            echo "<option value='$desa->id'>$desa->name</option>";
        }
    }
}