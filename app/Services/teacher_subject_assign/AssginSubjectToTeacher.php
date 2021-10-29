<?php

namespace App\Services\teacher_subject_assign;

use App\Models\TeacherModel;

class AssginSubjectToTeacher
{
    public function assign($teacherId, $subjectId)
    {
        $model = TeacherModel::find($teacherId);
        $model->teacher_subjects = $model->teacher_subjects == null ? $subjectId : $model->teacher_subjects.",".$subjectId;
        return $model->save();
    }

    public function withdraw($teacherId, $subjectId)
    {
        $model = TeacherModel::find($teacherId);
        $model->teacher_subjects = $model->teacher_subjects == null ? $subjectId : $model->teacher_subjects.",".$subjectId;
        return $model->save();
    }
}