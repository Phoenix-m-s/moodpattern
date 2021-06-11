<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTopics extends Model
{
    use HasFactory;
    protected $table='user_topics';
    protected $fillable = ['id','title', 'topic_type_class_id','save_step','users_id'];
    public $timestamps = false;
}
