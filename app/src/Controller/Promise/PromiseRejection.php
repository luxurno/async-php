<?php

namespace App\Controller\Promise;

use App\Controller\Promise\Exception\PromiseException;

class PromiseRejection
{
    /**
     * @throws PromiseException
     */
    public function __invoke(): void
    {
        throw new PromiseException('Promise rejected');
    }
}
