<?php

namespace App\Http\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public Client $client;

    public function __construct(
        private string $base_uri = 'https://jsonplaceholder.typicode.com/',
        private float  $timeout = 2.0,
        private bool   $verify = false,
    )
    {
        $this->client = new Client([
            // Base URI is used with relative requests
//            'base_uri' => 'http://httpbin.org',
            'base_uri' => $this->base_uri,
            // You can set any number of default request options.
            'timeout' => $this->timeout,
            'verify' => $this->verify,
        ]);
    }


}
