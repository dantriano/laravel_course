<?php

namespace App\Exceptions;

use Exception;

class NewProductException extends \Illuminate\Database\QueryException
{
    public function report()
    {
        
    }
    public function render($request, Exception $exception)
    {
        echo $exception;
    }
}
