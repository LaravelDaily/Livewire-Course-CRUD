<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'in_stock',
        'stock_date',
        'photo'
    ];

    const COLORS_LIST = [
        'red' => 'Red',
        'green' => 'Green',
        'blue' => 'Blue'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getStockDateAttribute()
    {
        if (!$this->attributes['stock_date']) {
            return '';
        }
        $date = new Carbon($this->attributes['stock_date']);

        return $date->format('m/d/Y');
    }

    public function setStockDateAttribute($value)
    {
        if ($value == '') {
            $this->attributes['stock_date'] = NULL;
        } else {
            $date = Carbon::createFromFormat('m/d/Y', $value);
            $this->attributes['stock_date'] = $date->format('Y-m-d');
        }
    }
}
