<?php

class SiteController extends CommonController
{
    protected string $path_views = 'site';

    public function actionIndex(string $name = '') {
        return $this->renderFile('index', [
            'name' => $name
        ]);
    }

    public function actionFoo() {
        echo "Foo";
    }
}
