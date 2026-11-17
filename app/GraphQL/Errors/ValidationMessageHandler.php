<?php

namespace App\GraphQL\Errors;

use Closure;
use GraphQL\Error\Error;
use Nuwave\Lighthouse\Execution\ErrorHandler;
use Nuwave\Lighthouse\Exceptions\ValidationException;

class ValidationMessageHandler implements ErrorHandler
{
    public function __invoke(?Error $error, Closure $next): ?array
    {
        if ($error === null) {
            return $next(null);
        }

        $previous = $error->getPrevious();

        if ($previous instanceof ValidationException) {
            $validation = $error->getExtensions()['validation'] ?? [];
            $first = collect($validation)->flatten()->first();

            if ($first) {
                $error = new Error(
                    $first,
                    $error->getNodes(),
                    $error->getSource(),
                    $error->getPositions(),
                    $error->getPath(),
                    $previous,
                    $error->getExtensions()
                );
            }
        }

        return $next($error);
    }
}
