<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    use HasFactory;

    public $fillable = ['nama_kartu', 'total','nomor'];
    public $visible = ['nama_kartu', 'total','nomor'];
    public $timestamps = true;

    public function kartu()
    {
        return $this->hasMany(Kartu::class, 'id_kartu');
    }

}
