<?php

namespace App\Http\Integrations\DataForSeo;

use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Http\Auth\BasicAuthenticator;


class DataForSeoConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.dataforseo.com/v3';
    }

    /**
     * Default headers for every request
     *
     * @return string[]
     */
    protected function defaultHeaders(): array {
        return ["Content-Type"=>"application/json"];
    }


    /**
     * Default HTTP client options
     *
     * @return string[]
     */
    protected function defaultConfig(): array {
        return [];
    }
}
