<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merk';

    protected $fillable = ['nama_merk'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'merk_id');
    }
}
