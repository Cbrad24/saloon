<?php

declare(strict_types=1);

namespace Saloon\Contracts;

interface Authenticator
{
    /**
     * Apply the authentication to the request.
     */
    public function set(PendingRequest $pendingRequest): void;
}
