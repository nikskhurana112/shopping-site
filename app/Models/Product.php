<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Title', 'Description', 'ImagePath', 'Price'
    ];
    
    protected $appends = ['short_description'];

    // getValueAttribute
    public function getShortDescriptionAttribute()
    {
        return substr($this->Description,0,30);
    }
}
