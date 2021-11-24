<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UMKM;
use App\Models\Village;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index()
    {

    }

    public function getCategoryCountByVillage(Request $request)
    {
        $category = [
            'makanan' => UMKM::where(['village_id'=>$request->village_id,'category_id'=>1])->count(),
            'minuman' => UMKM::where(['village_id'=>$request->village_id,'category_id'=>2])->count(),
            'pakaian' => UMKM::where(['village_id'=>$request->village_id,'category_id'=>3])->count(),
            'pariwisata' => UMKM::where(['village_id'=>$request->village_id,'category_id'=>4])->count(),
        ];
        $village = Village::find($request->village_id);
        $district = $village->district;
        return response()->json([
            'category'=>$category,
            'village'=>$village,
            'district'=>$district
        ]);
    }
}
