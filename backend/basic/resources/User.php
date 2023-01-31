<?php

namespace app\resources;

class User extends \app\models\User
{
    public function fields()
    {
        return ['id', 'username', 'password', 'is_student','student'];
    }
}
