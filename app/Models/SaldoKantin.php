<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoKantin extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = null;
    public $table = "saldo_kantin";
    protected $fillable = [
        'saldo',
    ];
}
