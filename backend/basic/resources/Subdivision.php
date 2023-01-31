<?php

namespace app\resources;

class Subdivision extends \app\models\Subdivision
{
    public function fields()
    {
        return ['id', 'name', 'audiences', 'building'];
    }
}