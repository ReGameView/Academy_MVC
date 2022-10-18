<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CRUDController extends BaseController
{
    private array $models =
        [
            'user' => User::class
        ];


    public function index($model)
    {
        if (isset($this->models[$model])) {
            /** @var User $current_model */
            $current_model = $this->models[$model];
            $this->SendResponse($current_model::all()->toArray());
        }

        $this->SendResponse('Not Found', false);
    }

    public function create($model, Request $request)
    {
        if (isset($this->models[$model])) {
            $current_model = $this->models[$model];
            $object = new $current_model;
            foreach ($object->fieldsToSave as $field) {

                if ($request->has($field)) {
                    $object->setAttribute($field, $request->input($field));
                } else {
                    $this->SendResponse("Need argument: $field", false);
                }

//                if ($field === 'password') {
//                    $user->setAttribute('password', Hash::make($request->input('password')));
//                } elseif ($request->has($field)) {
//                    $user->setAttribute($field, $request->input($field));
//                } else {
//                    $this->SendResponse("Need argument: $field", false);
//                }
            }
            $object->save();
            $this->SendResponse($object->toArray());
        }
        $this->SendResponse('Not Found', false);

    }

    public function get($model, $id)
    {
        if (isset($this->models[$model])) {
            /** @var User $current_model */
            $current_model = $this->models[$model];
            $this->SendResponse($current_model::find($id)->toArray());
        }

        $this->SendResponse('Not Found', false);
    }

    public function update($model, $id, Request $request)
    {
        if (isset($this->models[$model])) {
            $current_model = $this->models[$model];
            $object = $current_model::find($id);
            if ($object instanceof $current_model) {
                foreach ($object->fieldsToUpdate as $field) {
                    $object->setAttribute($field, $request->input($field));
                }
                if ($object->save()) {
                    $this->SendResponse($object->toArray());
                } else {
                    $this->SendResponse('Не удалось обновить объект', false);
                }
            } else {
                $this->SendResponse('Данного объекта не существует', false);
            }
        }
        $this->SendResponse('Not Found', false);
    }

    public function destroy($model, $id)
    {
        if (isset($this->models[$model])) {
            $current_model = $this->models[$model];

            $object = $current_model::find($id);
            if ($object instanceof $current_model) {
                if ($current_model::destroy($id)) {
                    $this->SendResponse();
                } else {
                    $this->SendResponse('Ошибка при удаление', false);
                }
            } else {
                $this->SendResponse('Данного объекта не существует', false);
            }
        }
        $this->SendResponse('Not Found', false);
    }
}
