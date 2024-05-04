<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'workers';
    public $guarded = false;
   

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
