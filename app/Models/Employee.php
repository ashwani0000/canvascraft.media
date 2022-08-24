<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public $table = "employe";
    use HasFactory;
    // protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email'
    ];
    
    public function getEmployeesOfaCompany(){
        $user_idd = auth()->user()->id;

        $employeArray = DB::table('employe')->where('user_id', $user_idd)->get();
        return $employeArray;
    }
}
