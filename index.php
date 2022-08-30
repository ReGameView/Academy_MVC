<?php
const DEBUG = true;

include_once 'service_load.php'; // Сервисные классы
include_once 'config.php'; // Конфигурация
/**
 * @var array $routing Пути до Контроллеров
 */

// Получаем так называемый URI http://vk.com/messengers/api/send?id=1234567890
// (Мы получаем: /messengers/api/send?id=1234567890)
[0 => $uri, 1 => $query] = explode('?', $_SERVER['REQUEST_URI'], 2);

if (isset($routing[$uri])) {
    [0 => $controller, 1 => $action] = explode(':', $routing[$uri]);

    $path_controller = __DIR__ . '/controllers/' . $controller . '.php';

    if (file_exists($path_controller)) {
        include_once $path_controller;

        $action = 'action' . ucfirst($action);

        $obj_controller = new $controller();

        if (method_exists($obj_controller, $action)) {
            $obj_controller->$action();
        } else {
            writeLog("Ошибка!!! Такого действия не существует! Контроллер: $controller Действие: $action", true);
        }
    } else {
        writeLog("Ошибка!!! Файла Контролера не существует ($path_controller)", true);
    }
} else {
    writeLog("404 ошибка", true);
}


function writeLog(string $string = "", bool $is_end = false)
{
    if (DEBUG) {
        echo $string;
    } else {
        $pathLog = __DIR__ . '/runtime/logs/app.log';

        $fileLog = fopen($pathLog, 'a+');
        fwrite($fileLog, $string . "\n");
        fclose($fileLog);
    }

    if ($is_end) {
        exit;
    }
}
