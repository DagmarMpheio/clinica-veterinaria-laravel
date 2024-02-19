<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'specie',
        'race',
        'image',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class); //um animal pertence a um usuario
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
