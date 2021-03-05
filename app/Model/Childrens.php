<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Childrens extends Model
{
    use SoftDeletes;
    use Notifiable;
    
    protected $table = 'childrens';
 
    protected $fillable = ['id', 'name', 'age'];
 
    protected $hidden = ['employees_id'];

    /**
     * Relacion con employees N a 1
     */
    public function employees(){
        return $this->belongsTo('App\Model\Employees', 'employees_id', '*')->withTrashed();
    }
}
