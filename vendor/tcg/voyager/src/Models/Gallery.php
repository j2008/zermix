<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Gallery extends Model
{
    const PUBLISHED = 'PUBLISHED';

    protected $table = 'gallery';

    public function post()
    {
        //$this->hasMany('App\Comment', 'foreign_key', 'local_key');
        return $this->hasOne('TCG\Voyager\Models\Post','id','post_id');
    }
}
