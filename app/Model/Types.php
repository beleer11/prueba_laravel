<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Types extends Model
{
    use SoftDeletes;
    use Notifiable;
    
    protected $table = 'types';
 
    /**
     * Relacion con employees 1 a N
     */
    public function employees(){
        return $this->hasMany('App\Model\Employees')->withTrashed();
    }
 
}
