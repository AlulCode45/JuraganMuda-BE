<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukModel extends Model
{
    use HasFactory;

    protected $table = 'foto_produk';
    protected $guarded = ['id'];

    public $timestamps = false;
}
