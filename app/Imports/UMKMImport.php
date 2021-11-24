<?php

namespace App\Imports;

use App\Models\{UMKM, Category, Coordinate, District, Village};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\{ToCollection};

class UMKMImport implements ToCollection
{
    /**
    * @param array $row
    *
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $key=>$row)
        {
            // start from row index 4
            if($key<4 || empty($row[2])) continue;
            
            // get row district
            $district = District::where('name', strtoupper($row[6]))->first();
            
            // get row village
            $village = $district->villages->where('name', strtoupper($row[5]))->first();
            
            // check if village exist
            if(empty($village->name))
            {
                continue;
            }

            // check if village coordinate already created
            if(!Coordinate::where('village_id', $village->id)->first())
            {
                Coordinate::create([
                    'village_id' => $village->id,
                    'latitude' => $row[9],
                    'longitude' => $row[10],
                ]);
            }

            $category = [
                'IKM MAKANAN' => 1,
                'IKM MINUMAN' => 2,
                'IKM PAKAIAN' => 3,
                'IKM PARIWISATA' => 4
            ];

            UMKM::create([
                'category_id' => $category[$row[8]],
                'name'  => $row[2],
                'owner_name' => $row[3],
                'address' => $row[4],
                'village_id' => $village->id,
                'district_id' => $district->id,
                'regency_id' => $district->regency->id,
                'province_id' => $district->regency->province->id,
                'business_type' => $row[7]
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '2' => 'required'
        ];
    }
}
