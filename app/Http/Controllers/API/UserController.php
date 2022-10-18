<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function index()
    {
        $this->SendResponse(User::all()->toArray());
    }

    public function create(Request $request)
    {
        $user = new User();
        foreach ($user->fieldsToSave as $field) {
            if ($field === 'password') {
                $user->setAttribute('password', Hash::make($request->input('password')));
            } elseif ($request->has($field)) {
                $user->setAttribute($field, $request->input($field));
            } else {
                $this->SendResponse("Need argument: $field", false);
            }
        }
        $user->save();
        $this->SendResponse($user->toArray());
    }

    public function get($id)
    {
        $this->SendResponse(User::find($id)->toArray());
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if ($user instanceof User) {
            foreach ($user->fieldsToUpdate as $field) {
                $user->setAttribute($field, $request->input($field));
            }
            if ($user->save()) {
                $this->SendResponse($user->toArray());
            } else {
                $this->SendResponse('Не удалось обновить пользователя', false);
            }
        } else {
            $this->SendResponse('Данного юзера не существует', false);
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user instanceof User) {
            if(User::destroy($id)) {
                $this->SendResponse();
            } else {
                $this->SendResponse('Ошибка при удаление', false);
            }
        } else {
            $this->SendResponse('Данного юзера не существует', false);
        }
    }

    public function changePassword($id, Request $request)
    {
        $user = User::find($id);

        // Проверка что повтор пароля и пароль совпадают
        //      Добавление пароля в модельку
        //      Сохранение нового пароля
        //      Вывод
        // Если не совпадает, то ошибка
    }

}
