<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'positions';

    public function workers(){
        return $this->hasMany(Worker::class);
    }

    public function queryWorker(){
        return $this->hasOne(Worker::class)->ofMany('age', 'min');
    }
    // public function queryWorker(){
    //     return $this->hasOne(Worker::class)->where('name', '')
    // }
}
