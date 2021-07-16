<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
  
class topic_scores extends Model
{
    use HasApiTokens, HasFactory;
    protected $tabel = "topic_scores";
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        "user_topics_id", "approach", "sensor_words_id", "score"
    ];
}