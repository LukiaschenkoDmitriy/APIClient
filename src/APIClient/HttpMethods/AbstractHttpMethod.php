<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\HttpMethods;

use Dmytrii\ClientLibrary\APIClient\Enums\HttpMethodsEnum;
use Dmytrii\ClientLibrary\APIClient\Interfaces\HttpMethodInterface;

abstract class AbstractHttpMethod implements HttpMethodInterface {
    protected array $data;
    public function __construct(array $data = []) {
        $this->data = $data;
    }
    
    public function buildEndpoint(): string {
        $endpoint = $this->getEndpoint();
        foreach ($this->data as $key => $value) {
            $endpoint = str_replace('{' . $key . '}', (string) $value, $endpoint);
        }
        return $endpoint;
    }


    public abstract function getId(): string;

    public abstract function getOptions(): array;

    public abstract function getEndpoint(): string;
    
    public abstract function getHeader(): array;

    public abstract function getMethod(): HttpMethodsEnum;
}
