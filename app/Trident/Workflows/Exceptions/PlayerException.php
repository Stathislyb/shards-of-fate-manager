<?php

namespace App\Trident\Workflows\Exceptions;

use Exception;

class PlayerException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {   
        // return parent::report($exception);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response('');

        // return parent::render($request);
    }
}
