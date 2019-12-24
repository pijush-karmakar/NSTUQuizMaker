<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseTeacher extends Pivot
{
    protected $table = 'course_teacher';
}
