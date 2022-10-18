<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Вывод всех данных
     *
     */
    public function index()
    {
        return view('table.list');
    }

    /**
     * Сохранение нового объекта в базу данных (ресурс)
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Показать объект ресурса
     *
     * @param  Model  $model
     */
    public function show(Model $model)
    {
        //
    }

    /**
     * Обновить данные по объекту с внесением в базу данных (ресурс)
     *
     * @param \Illuminate\Http\Request $request
     * @param Model                    $model
     */
    public function update(Request $request, Model $model)
    {
        //
    }

    /**
     * Удаление объекта в базе данных (ресурса)
     *
     * @param  Model         $model
     */
    public function destroy(Model $model)
    {
        //
    }



}
