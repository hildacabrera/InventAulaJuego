<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Material extends Model
{
    use HasFactory;
    protected $table = 'tipo_material';
    public $timestamps =false;
    protected $primaryKey = 'id';
}
