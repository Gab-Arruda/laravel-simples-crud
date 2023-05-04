<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $fillable = ['produto_id', 'quantity'];

    public function produto()
    {
        return $this->hasOne(
            Produto::class,
            'id',
            'produto_id'
        );
    }
}
