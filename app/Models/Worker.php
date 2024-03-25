<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    public $guarded = false;
    protected $table = 'workers';


    public function profile(){
        return $this->hasOne(Profile::class, 'worker_id', 'id');
    }

    public function avatar(){
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function reviews(){
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
