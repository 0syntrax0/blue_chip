<?php

namespace Blue_Chip_Marketing;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name
    protected $table = 'posts';

    // primarry key
    public $primaryKey = 'id';

    // timestamps
    public $timestamps = TRUE;

    // Assign posts to current user
    public function user()
    {
    	return $this->belongsTo('Blue_Chip_Marketing\User');
    }
}
