<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkSubKategori extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merk_subkategori';

    protected $fillable = ['merk_subkategori'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'merk_subkategori_id');
    }
}
