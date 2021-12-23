<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkKategori extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merk_kategori';

    protected $fillable = ['merk_kategori'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'merk_kategori_id');
    }
}
