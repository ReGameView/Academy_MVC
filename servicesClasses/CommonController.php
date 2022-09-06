<?php

class CommonController
{
    protected string $path_views = 'site';
    private string $full_path_view = '';

    public function renderFile(string $view = '', array $params = []): bool {
        $this->full_path_view = __DIR__ . '/../views/' . $this->path_views . '/' . $view . '.php';
        if (file_exists($this->full_path_view)) {
            unset($view);
            extract($params, EXTR_OVERWRITE, 'sys_');
            include_once $this->full_path_view;
            return true;
        } else {
            writeLog("Данного представления не существует! $view");
            return false;
        }
    }

    public function returnResponse($data = [], $status = 'success'): bool
    {
        $delta = microtime(true) - START_TIME;

        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode([
            'status' => $status,
            'data' => $data,
            'timeline' => floor($delta * 1000)
        ]);

        return true;
    }
}
