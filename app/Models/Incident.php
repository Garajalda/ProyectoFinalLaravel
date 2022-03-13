<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    public static $rules = [

        'category_id' => 'nullable|exists:categories,id',
        'severity' => 'required|in:M,N,A',
        'title' => 'required|min:5',
        'description' => 'required|min:15'
    ];

    public static $messages = [
        'title.required' => 'Debe añadir un título.',
        'title.min' =>'El título deberá tener como mínimo 5 caracteres',
        'description.required' => 'Debe añadir una descripción.',
        'description.min' => 'La descripción deberá tener como mínimo 15 caracteres.'
    ];
  
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function support(){
        return $this->belongsTo('App\Models\User','support_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\User','client_id');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }




    public function getSeverityNameAttribute(){
        switch($this->severity){
            case 'M':
                return 'Menor';
            case 'N':
                return 'Normal';
            default:
                return 'Alta';
        }
    }

    public function getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;
        }
        return 'General';
    }

    public function getSupportNameAttribute(){
        if($this->support){
            return $this->support->name;
        }
        return 'Sin asignar';
    }

    public function getStateAttribute(){
        if($this->active == 0){
            return 'Resuelto';
        }
        if($this->support_id){
            return 'Asignado';
        }
        return 'Pendiente';
    }
}
