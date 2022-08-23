<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeModel extends Model
{
    public $table = "employe";
    use HasFactory;
    // protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email'
    ];
}
