<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // Función padre que va a tomar las respuestas enviadas por los controladores hijos
    // https://php.watch/versions/8.0/mixed-type

    public function sendResponse(string $message, mixed $result = [], mixed $errors = [], int $code = 200)
    {
        //construimos la respuesta---forma de array asocviativo.
        $response = ['message' => $message];
        // Si el resultado no esta vacio se agrega otra clave y valor al array
        //verificamos, si el resultado no está vacío.
        if (!empty($result))
        {
            // https://www.php.net/manual/es/language.types.array.php
            $response['data'] = $result;
        }
        // Si los errores no estan vacios se agrega otra clave y valor al array
        if (!empty($errors))
        {
            // https://www.php.net/manual/es/language.types.array.php
            $response['errors'] = $errors;
        }
        // Se determina el retorno de la respuesta
        // https://laravel.com/docs/9.x/responses#json-responses
        return response()->json($response, $code);
    }


}

