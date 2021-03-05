<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**Modelos */
use App\Model\Types;
use App\Model\Childrens;
use App\Model\Contracts;

class Employees extends Model
{
    use SoftDeletes;
    use Notifiable;
    
    protected $table = 'employees';
  
    protected $hidden = ['types_id'];

    // Borrado logicos
	protected $dates = ['deleted_at'];

    /** 
     * Relacion con contracts 1 a N
     */
    public function contracts(){
        return $this->hasMany(Contracts::class);
    }

    /**
     * Relacion con childrens 1 a N
     */
    public function childrens(){
        return $this->hasMany(Childrens::class);
    }

    /**
     * Relacion con types N a 1
     */
    public function types(){
        return $this->belongsTo(Types::class);
    }
    
 
}
