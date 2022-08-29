<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public $table = "employe";
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'id', 'user_id');
    }

    // protected $primaryKey = 'user_id';

}
