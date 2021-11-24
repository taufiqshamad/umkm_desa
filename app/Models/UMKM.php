<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function makanan()
    {
        return $this->where('category', 1);
    }

    public function minuman()
    {
        return $this->where('category', 2);
    }

    public function pakaian()
    {
        return $this->where('category', 3);
    }

    public function pariwisata()
    {
        return $this->where('category', 4);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
