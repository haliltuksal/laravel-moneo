<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\Eloquent\InvalidCastException;
use PDOException;
use Throwable;

class DatabaseException extends Exception
{
    public static function report(Throwable $exception): bool
    {
        if (
            $exception instanceof ModelNotFoundException ||
            $exception instanceof MassAssignmentException ||
            $exception instanceof RelationNotFoundException ||
            $exception instanceof InvalidCastException ||
            $exception instanceof PDOException
        ) {
            return true;
        } else {
            return false;
        }
    }

}
