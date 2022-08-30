<?php

class CommonController
{
    protected string $path_views = 'site';

    public function renderFile(string $view = '', array $params = []): bool {

        $path_view = __DIR__ . '/../views/' . $this->path_views . '/' . $view . '.php';

        if (file_exists($path_view)) {
            include $path_view; // TODO:: Научиться передавать переменные
            return true;
        } else {
            writeLog("Данного представления не существует! $view");
            return false;
        }
    }
}
