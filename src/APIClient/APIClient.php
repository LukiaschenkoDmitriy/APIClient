<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient;

use Dmytrii\ClientLibrary\APIClient\HttpMethods\HttpGetTripMethod;
use Dmytrii\ClientLibrary\APIClient\HttpMethods\HttpPostTripMethod;

class APIClient extends AbstractAPIClient {

    public function __construct(string $domen) {
        parent::__construct($domen);
    }

    public function methods(): array
    {
        return [
            HttpGetTripMethod::class,
            HttpPostTripMethod::class
        ];
    }
}