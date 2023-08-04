<?php

namespace App\Services;


class AlertService
{
    public static function successMessage($message): array
    {
        return [
            'alertMsg' => ['success' => $message],
            'statusCode' => 202,
        ];
    }
    protected static function errorMessage($message): array
    {
        return [
            'alertMsg' => ['errorMsg' => $message],
            'statusCode' => 422,
        ];
    }


}
