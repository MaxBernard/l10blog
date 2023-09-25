<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  protected $fillable = [
    'author_id', 'title', 'content', 'slug',
    'category', 'tag', 'year', 'month'. 'cover_image', 'public'
  ];
}
