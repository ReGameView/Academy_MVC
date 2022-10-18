<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function SendResponse($data = [], bool $is_success = true)
    {
        header('Content-Type: application/json; charset=utf-8');

        if ($is_success)
        {
            echo $this->Success($data);
        } else {
            echo $this->Error($data);
        }
        exit;
    }

    private final function Success($data): string
    {
        return json_encode([
            'Status' => 'Success',
            'Data' => $data
        ]);
    }
    private final function Error($data): string
    {
        return json_encode([
            'Status' => 'Error',
            'MessageError' => $data
        ]);
    }
}
