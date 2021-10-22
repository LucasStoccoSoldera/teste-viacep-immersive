<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public $table='enderecos';

    protected $fillable = [
        'id',
        'end_cidade',
        'end_rua',
    ];
}
