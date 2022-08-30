<?php
//
/**
 * ClassController:actionName
 *
 * ClassController -- Класс, находящийся в папке controllers
 * actionName -- Функция класса
 * : -- сапаратор (который делит две переменные в одной строке)
 */
$routing = [
    '/' => 'SiteController:index', /** @see SiteController */ /** @see SiteController::actionIndex() */
    '/foo' => 'FooController:index' /** @see FooController */ /** @see FooController::actionIndex() */
];

$routing_2 = [
    '/' => [
        'controller' => SiteController::class,
        'action' => 'actionIndex',
        'query' => [
            'foo' => 'bar'
        ]
    ]
];
