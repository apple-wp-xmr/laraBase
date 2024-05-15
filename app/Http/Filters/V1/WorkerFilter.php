<?php

namespace App\Http\Filters\V1;

use Illuminate\Contracts\Database\Eloquent\Builder;

class WorkerFilter{

    const NAME = 'name';
    const SURNAME = 'surname';
    const AGE_FROM = 'from';
    const AGE_TO = 'to';
    const DESCRIPTION = 'description';
    const IS_MARRIED = 'isMarried';

    public array $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getCallbacks(){
        return [
            self::NAME => 'name',
            self::SURNAME => 'surname',
            self::AGE_FROM => 'ageFrom',
            self::AGE_TO => 'ageTo',
            self::DESCRIPTION => 'description',
            self::IS_MARRIED => 'isMarried',
        ];
    }

    public function applyFilters(Builder $builder){
        foreach($this->getCallbacks() as $key => $callback){
            if(isset($this->params[$key])){
                $this->$callback($builder, $this->params[$key]);
            }
        }
    }

    public function name(Builder $builder, $value){
        $builder->where('name', 'like', "%{$value}%");
    }

    public function surname(Builder $builder, $value)
    {
        $builder->where('surname', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function ageFrom(Builder $builder, $value){
        $builder->where('age', '>', $value);
    }

    public function ageTo(Builder $builder, $value){
        $builder->where('age', '<', $value);
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function isMarried(Builder $builder, $value){
        $builder->where('is_married', true);
    }
}