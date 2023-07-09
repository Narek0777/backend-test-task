<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

     public function render($request, Throwable $exception)
     {
        if ($exception instanceof ValidationException) {
                 return response()->json([
                     'message' => 'Validation failed',
                     'errors' => $exception->errors(),
                 ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

              if ($exception instanceof ModelNotFoundException) {
                        return response()->json([
                            "message" => $exception->getMessage()
                        ],404);
                    }
            return parent::render($request, $exception);
      }
}
