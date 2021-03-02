<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Curso
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $category_id
 * @property int $level_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string|null $picture
 * @property string $status
 * @property int $previous_approved
 * @property int $previous_reject
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePreviousApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePreviousReject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Curso extends Model
{
    const PUBLISHED =1;
    const PENDING=2;
    const REJECTED=3;

    public function category(){
        return $this->belongsTo(related:Category::class)->select('id','name');
    }

    public function goals () {
		return $this->hasMany(Goal::class)->select('id', 'curso_id', 'goal');
	}

    public function level(){
        return $this->belongsTo(related:Lavel::class)->select('id','name');
    }

    public function reviews(){
        return $this->hasMany(related:Review::class)->select('id','user_id','curso_id','rating','comment','created_at');
    }
    public function requirements(){
        return $this->hasMany(related:Requirement::class)->select('id','curso_id','requirement');
    }
    public function students(){
        return $this->belongsToMany(related:Students::class);
    }
    public function teacher(){
        return $this->belongsTo(related:Teacher::class);
    }
    }

