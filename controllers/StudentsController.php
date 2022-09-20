<?php
include_once __DIR__ . '/../models/Students.php';


class StudentsController
{
    public function actionIndex() {

        $students = new Students();
        var_dump($students->findOne()); exit;
    }
}
