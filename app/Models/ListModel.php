<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListModel extends Model
{
    use HasFactory;
    
    protected $table    = 'tb_list';

    protected $fillable     = ['user_id','judul','kategori_id','waktu','status_list','tanggal_list','deskripsi'];
 
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
