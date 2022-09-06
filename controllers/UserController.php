<?php
include_once __DIR__ . '/../models/User.php';



class UserController extends CommonController
{
    protected string $path_views = 'user';

    public function actionGet(): bool
    {
        return $this->returnResponse(User::findOne());
    }

    public function actionList(): bool
    {
        return $this->returnResponse(User::findAll());
    }
}
