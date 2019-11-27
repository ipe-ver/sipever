<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;

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
        if($exception instanceof QueryException){
            $stack = collect($exception->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all();
            $array = array('message'=>$exception->getMessage());
            $mensaje_aux = explode("]", iconv("utf-8", "utf-8//ignore", $array['message']));
            dd(iconv("utf-8", "utf-8//ignore", $array['message']));
            if(sizeof($mensaje_aux) > 2){
                $mensaje = explode("\r", $mensaje_aux[2])[0];
            }else{
                $mensaje = 'Error en transacción';
            }
           
            $error = [
                'codigo' => $exception->getCode(),
                'file' => $exception->getFile(),
                'mensaje' => $mensaje,
            ];
            return response()->view('almacen.error', compact('error', 'stack'));
        }
        return parent::render($request, $exception);
    }
}
