<?php

namespace Sammyjo20\Saloon\Tests\Fixtures\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Enums\Method;
use Sammyjo20\Saloon\Http\PendingSaloonRequest;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Tests\Fixtures\Connectors\TestConnector;

class UserRequest extends SaloonRequest
{
    /**
     * Define the method that the request will use.
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * The connector.
     *
     * @var string
     */
    protected string $connector = TestConnector::class;

    /**
     * @param int|null $userId
     * @param int|null $groupId
     */
    public function __construct(public ?int $userId = null, public ?int $groupId = null)
    {
        $this->middleware()
            ->addRequestPipe(function (PendingSaloonRequest $request) {
                $request->headers()->put('X-Name', 'Sam');

                return $request;
            })
            ->addRequestPipe(function (PendingSaloonRequest $request) {
                return $request;
            })
            ->addResponsePipe(function (SaloonResponse $response) {
                //
            });
    }

    /**
     * @return string
     */
    protected function defineEndpoint(): string
    {
        return '/user';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json'
        ];
    }
}
