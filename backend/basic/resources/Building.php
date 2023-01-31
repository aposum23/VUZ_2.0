<?php

namespace app\resources;

class Building extends \app\models\Building
{
    public function fields()
    {
       /* return [
            'name',
            'subdivision',
            'audience'
        ];*/
        return [
            'id',
            'name',
            'subdivisions',
            'audiences',
            'audienceCount',
            'lectionCount',
            'practicCount',
            'computerCount'
        ];
    }
}