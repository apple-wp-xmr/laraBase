<?php

namespace App\Http\Filters\V1;

use Illuminate\Contracts\Database\Eloquent\Builder;

class PostFilter{

    const TITLE = 'title';
    const VIEW = 'view';
 

    public array $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getCallbacks(){
        return [
            self::TITLE => 'title',
            self::VIEW => 'view',
        ];
    }

    public function applyFilters(Builder $builder){
        foreach($this->getCallbacks() as $key => $callback){
            if(isset($this->params[$key])){
                $this->$callback($builder, $this->params[$key]);
            }
        }
    }

    public function title(Builder $builder, $value){
        $builder->where('title', 'like', "%{$value}%");
    }

    public function view(Builder $builder, $value){
        $builder->where('view', '>', $value);
    }


}