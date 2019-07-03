<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog_tbl';
    protected $primaryKey = 'id';
    protected $fillable = [
      'judul',
      'isiberita',
      'foto'
    ];
}
