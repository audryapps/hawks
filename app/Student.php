<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Stundent
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Stundent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stundent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stundent query()
 * @mixin \Eloquent
 */
class Student extends Model
{
    public function curso (){
        return $this->belongsToMany(related:Curso::class);
    }

    public function user(){
        return $this->belongsTo(related:User::class)->select('id','role_id','name','email');
    }
}
