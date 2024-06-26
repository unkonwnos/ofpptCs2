<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function filiers(){
        return $this->hasMany(Filier::class,'secteur_id');
    }
    static function NameSecteur(){
        return Secteur::select('id','name')->get() ;
    }
}
