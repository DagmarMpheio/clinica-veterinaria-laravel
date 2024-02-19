<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id', 'payment_method','total'
    ];

    // Define o relacionamento com produtos
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity'); // sera incluída na tabela pivô que vincula pedidos e produtos
    }

    // Define o relacionamento com usuários
    public function user()
    {
        return $this->belongsTo(User::class); // um pedido pertence a um usuário.
    }
}
