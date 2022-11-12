<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlugarFilme extends Model
{
    use HasFactory;

    protected $table = 'alugar_filme';
    protected $fillable = ['filme_id','nome','email','data_expiracao'];
}
