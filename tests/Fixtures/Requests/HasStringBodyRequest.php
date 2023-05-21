<?php

declare(strict_types=1);

namespace Saloon\Tests\Fixtures\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasStringBody;
use Saloon\Contracts\Body\HasBody as HasBodyContract;

class HasStringBodyRequest extends Request implements HasBodyContract
{
    use HasStringBody;

    /**
     * Define the method that the request will use.
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request.
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/user';
    }

    protected function defaultBody(): ?string
    {
        return 'name: Sam';
    }
}
