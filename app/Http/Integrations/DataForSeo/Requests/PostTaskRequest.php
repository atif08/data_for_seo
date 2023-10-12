<?php

namespace App\Http\Integrations\DataForSeo\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Illuminate\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Domain\Orders\Models\OrderItem;

class PostTaskRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::POST;


    public function __construct()
    {

    }


    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'contractId' => 60300009299,
            'requestId' => 'ASDR84F5-18FE-5269-1874-10CA7247B021-123', // FIXME::mmn - get value from order_items reference column
        ];
    }


    protected function defaultBody(): array
    {
        return [[
            'language_code' => 'en',
            'location_code' => '2840',
            'keyword' => 'tests',
            'postback_url' => 'https://your-server.com/postbackscript.php',
            'postback_data' => 'advance',

        ]];
    }


    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return 'serp/google/organic/task_post';
    }
}
