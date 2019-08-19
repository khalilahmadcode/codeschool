<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $data = [
        'firstName', 
        'lastName', 
        'nickName', 
        'title', 
        'email', 
        'accessno', 
        'about', 
        'coursesTaught'
    ]; 
}
