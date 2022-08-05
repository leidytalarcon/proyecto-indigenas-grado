<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use  \Illuminate\Support\Facades\Redirect as Redirect;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException as UnauthorizedException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        
        if ($exception instanceof UnauthorizedException) {
            
            return redirect()->route("auth.view")->withErrors(['msg' => 'Debe iniciar sesión']);
            //but this will return an OK, 200 response.
        }
    
        return parent::render($request, $exception);
    }
}
