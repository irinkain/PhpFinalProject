<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_tag', 'tag_id', 'question_id');
    }

    /**
     * Returns an object off all the tags being used by questions.
     * @return object
     * todo this should be cached
     */
    public static function get_tags()
    {
        return self::distinct()->orderBy('name', 'asc')->get();
    }
}
