<?php

namespace app\resources;

class Audience extends \app\models\Audience
{
    public function fields()
    {
        return [
            'id',
            'building',
            'subdivision',
            'audienceType',
            'anumber',
            'length',
            'width',
            'seats_count',
            'square',
            'floor'
        ];
    }
}