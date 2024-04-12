<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    public $guarded = false;
    protected $table = 'workers';

    protected static function booted(){

        static::created(function($model){
             event(new CreatedEvent($model));
        });

        static::updated(function($worker){
            if($worker->wasChanged() && (int) $worker->getAttributes()['age'] !== (int) $worker->getOriginal('age') ){
                echo 'updated';
            }
        });
    }


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
