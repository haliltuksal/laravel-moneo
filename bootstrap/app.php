<?php

use App\Exceptions\DatabaseException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $throwable) {
            $message = $throwable->getMessage();
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $env = config('app.env');
            if (DatabaseException::report($throwable) && $env == 'production') {
                $message = 'SQL Exception';
            }

            if ($throwable instanceof NotFoundHttpException) {
                $code = Response::HTTP_NOT_FOUND;
            }

            if ($throwable instanceof ValidationException) {
                return response()->json([
                    'message' => __('validation.general'),
                    'errors' => $throwable->errors(),
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            return response()->json([
                'message' => $message,
                'code' => $code,
            ], $code);
        });
    })->create();
