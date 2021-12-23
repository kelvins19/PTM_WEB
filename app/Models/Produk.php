<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';

    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'supplier_id');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function merk_kategori()
    {
        return $this->belongsTo(MerkKategori::class);
    }

    public function merk_subkategori()
    {
        return $this->belongsTo(MerkSubKategori::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
