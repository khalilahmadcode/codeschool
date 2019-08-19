<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $filltable = [
        'courseName', 
        'courseDescription', 
        'courseTime', 
        'courseLecturer', 
        'courseFee', 
        'created_at', 
        'updated_at', 
        'lecturer_id'
    ]; 
}
