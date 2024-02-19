<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'description',
    ];

    public static function formatPrice($preco)
    {
        return number_format($preco, 2);
    }

    //retornar as imagens
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $directory = 'img/products';
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath))
                $imageUrl = asset("{$directory}/" . $this->image);
        }
        return $imageUrl;
    }
}
