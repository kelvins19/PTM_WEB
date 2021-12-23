<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggan';

    protected $fillable = ['nama_pelanggan', 'alamat', 'daerah'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'supplier_id');
    }
}
