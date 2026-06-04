<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class TableException extends Exception
{
    protected $message;
    protected $code;

    public function __construct(string $message = "Table error occured", int $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        parent::__construct($message, $code);
        $this->message = $message;
        $this->code = $code;
    }

    public function render()
    {
        return response()->json([
            'message' => $this->message,
            'success' => false,
        ], $this->code);
    }
}

