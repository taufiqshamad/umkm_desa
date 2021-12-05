<?php

namespace App\Http\Controllers;

use App\Imports\UMKMImport;
use App\Models\Coordinate;
use App\Models\UMKM;
use App\Models\Village;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function index()
    {
        // get all UMKM data
        $coordinates = Coordinate::with('village')->get();
        // render view with data
        return view('index', compact('coordinates'));
    }

    public function show()
    {
        return 0;
    }
    public function showAllVillageUMKM($village_id)
    {
        $UMKMs = UMKM::where('village_id', $village_id)->get();
        $village = Village::find($village_id);
        $category = "";
        return view('umkm', compact('UMKMs', 'village', 'category'));
    }
    public function showVillageUMKMByCategory($village_id, $category, Request $request)
    {
        $categoryArray = [
            'makanan' => 1, 
            'minuman' => 2, 
            'pakaian' => 3, 
            'pariwisata' => 4, 
        ];
        $UMKMs = UMKM::where([
            'village_id'=>$village_id,
            'category_id' => $categoryArray[$category]
        ])->get();
        $village = Village::findOrFail($village_id);
        return view('umkm', compact('UMKMs', 'village', 'category'));
    }

    public function umkmDetail($village_id, $category, $id, $slug)
    {
        $umkm = UMKM::findOrFail($id);
        $related_umkm = UMKM::where('id','!=',$umkm->id)->where('village_id', $umkm->village_id)->limit(8)->get();
        return view('umkm-detail', compact('umkm', 'related_umkm'));
    }
    
    public function import()
    {
        Excel::import(new UMKMImport, 'IKM Deli Serdang.xlsx');
    }

    public function allUMKM()
    {
        $UMKMs = UMKM::orderBy('is_featured', 'DESC')->paginate(60);
        // dd($UMKMs);
        $active = 'all-umkm';
        return view('all-umkm', compact('UMKMs', 'active'));
    }
}
