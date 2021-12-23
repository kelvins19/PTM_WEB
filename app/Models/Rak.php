<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rak';

    protected $fillable = ['nama_rak', 'deskripsi'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'rak_id');
    }
}
