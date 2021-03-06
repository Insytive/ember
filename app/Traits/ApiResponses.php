<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponses
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error', $message, 'code', $code]);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponse(['data' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        $transformer = $instance->transformer;

        $instance = $this->transformData($instance, $transformer);

        return $this->successResponse($instance, $code);
    }

    protected function showMessage(Model $message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }
}
