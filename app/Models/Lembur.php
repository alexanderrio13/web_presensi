<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $table = "lemburs";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','user_id','tgl','lemburmasuk','lemburkeluar','statuslembur','desc_lembur'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
