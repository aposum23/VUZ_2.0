<?php

namespace app\resources;

class Student extends \app\models\Student
{
    public function fields()
    {
        return [
            'id',
            'last_name',
            'first_name',
            'midle_name',
            'birth_date',
            'place_of_residence',
            'residential_address',
            'phone_number'
        ];
    }
}
