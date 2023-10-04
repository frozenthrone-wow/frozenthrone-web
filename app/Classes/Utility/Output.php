<?php

namespace App\Classes\Utility;

class Output {
    private static $outputTemplate = [
        'message' => "",
        'status' => "",
        'extra' => [],
    ];


    /**
     * Generates a JSON object to send as response to the frontend.
     *
     * @param string $message Default message "Success"
     * @param integer $status Default status 200
     * @param array $extra Default empty
     * @return object
     */
    public static function make(string $message = "Success", int $status = 200, array $payload = []): object
    {
        $output = self::$outputTemplate;

        $output['message'] = $message;
        $output['status'] = $status;
        $output['payload'] = $payload;

        return response()->json(
            [
                "message" => $output['message'],
                "payload" => $output['payload'],
            ],
            $output['status']
        );
    }
}
