<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Requirement
 *
 * @property int $id
 * @property int $course_id
 * @property string $requierement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereRequierement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Requirement extends Model
{
    public function curso(){
        return $this->belongsTo(related:Course::class);
    }
}
