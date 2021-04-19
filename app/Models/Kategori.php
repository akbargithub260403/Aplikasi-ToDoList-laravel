<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table    = 'tb_kategori';

    protected $fillable = ['user_id','nama_kategori','deskripsi_kategori'];

    public function listmodel()
    {
        return $this->hasMany(ListModel::class);
    }

}
