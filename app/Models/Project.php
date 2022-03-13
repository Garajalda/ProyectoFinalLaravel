<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public static $rules = [
        'name' => 'required',
        'start' => 'date'
    ];
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el proyecto.',
        'start.date' => 'La fecha no tiene un formato adecuado.'
    ];

    protected $fillable =[
        'name','description','start'
    ];


    //relationship
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //accessors
    public function categories(){
        return $this->hasMany('App\Models\Category');
    }
    public function levels(){
        return $this->hasMany('App\Models\Level');
    }
    public function getFirstLevelIdAttribute(){
        
        if($this->levels->first()){
            return $this->levels->first()->id;
        }
     
    }

}
