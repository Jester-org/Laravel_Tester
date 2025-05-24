<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Promotion;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'promotion_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}