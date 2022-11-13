<?php declare(strict_types=1);

namespace Saloon\Tests\Fixtures\Connectors;

use Saloon\Http\SaloonConnector;
use Saloon\Contracts\Body\WithBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AcceptsJson;

class PostJsonConnector extends SaloonConnector implements WithBody
{
    use AcceptsJson;
    use HasJsonBody;

    public function defineBaseUrl(): string
    {
        return apiUrl();
    }

    public function defaultBody(): array
    {
        return [
            'connectorId' => 1,
        ];
    }
}
