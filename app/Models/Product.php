<?php

namespace App\Models;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function productCategory() {
        return $this->belongsTo(ProductCategory::class);
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);
    }
}

