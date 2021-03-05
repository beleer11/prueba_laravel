<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Contracts extends Model
{
    use SoftDeletes;
    use Notifiable;
    
    protected $table = 'contracts';
 
    protected $fillable = ['id', 'name', 'date', 'file'];
 
    protected $hidden = ['employes_id'];

    /**
     * Relacion con employees N a 1
     */
    public function employees(){
        return $this->belongsTo('App\Model\Employees', 'employees_id', '*')->withTrashed();
    }
}
