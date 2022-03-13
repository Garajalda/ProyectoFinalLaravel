<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','project_id'];
    public function project(){
        return $this->hasMany('App\Models\Project');
    }

    public function getLevelIdAttribute(){
         
        if($this->id){
            return $this->id;
        }
        return "no";
        
    }

    
}
