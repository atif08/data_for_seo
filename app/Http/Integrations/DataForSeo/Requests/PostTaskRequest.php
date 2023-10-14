<?php

namespace App\Http\Integrations\DataForSeo\Requests;

use App\Models\SearchKeyword;
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


    public function __construct(public readonly \Illuminate\Http\Request $request,
                                public readonly SearchKeyword $searchKeyword,
                                public readonly int $i)
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
            'location_code' => $this->request->location_code,
            'keyword' => $this->request->keyword,
            'device' => $this->request->desktop,
            'search_keyword_id' => $this->searchKeyword->id,
            'repetition' => $this->i,
            'postback_url' => 'https://seo2.thewpmonster.com/api/post-back',
            'postback_data' => 'advanced',
            'tag'=>$this->searchKeyword->id.','.$this->i

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
