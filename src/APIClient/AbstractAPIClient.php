<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use Dmytrii\ClientLibrary\APIClient\Interfaces\HttpMethodInterface;
use Dmytrii\ClientLibrary\APIClient\Exceptions\InvalidMethodsImplementationException;
use Dmytrii\ClientLibrary\APIClient\HttpMethods\AbstractHttpMethod;

abstract class AbstractAPIClient {
    private HttpClientInterface $httpclient;
    private string $domen;
    public function __construct(string $domen) {
        $this->domen = $domen;
        $this->httpclient = HttpClient::create();

        if ($this->validateMethods());
    }

    public function ping() {
        $response = $this->httpclient->request('GET', $this->domen);
        return $response->getContent();
    }

    public function validateMethods(): bool
    {
        foreach ($this->methods() as $method) {
            if (!is_subclass_of( $method, HttpMethodInterface::class)) {
                throw new InvalidMethodsImplementationException(sprintf('"%s" must be a subclass of "%s".', $method, HttpMethodInterface::class));
            }
        }

        return true;
    }

    private function getMethodClassById(string $methodId): string {
        $methods = $this->methods();
    
        foreach ($methods as $methodClass) {
            $methodInstance = new $methodClass();
            if ($methodInstance->getId() === $methodId) {
                return $methodClass;
            }
        }
    
        throw new InvalidMethodsImplementationException(sprintf('No method found for ID "%s".', $methodId));
    }
    

    public function sendRequest(string $methodId, array $data) {
        /**
         * @var AbstractHttpMethod $methodClass
         */
        
        $methodClass = $this->getMethodClassById($methodId);
        
        $httpMethod = new $methodClass($data); 
        $url = $this->domen.$httpMethod->buildEndpoint();
    
        $response = $this->httpclient->request($httpMethod->getMethod()->value, $url, [
            'headers' => $httpMethod->getHeader(),
            'body' => json_encode($httpMethod->getOptions()),
        ]);
    
        return $response;
    }

    abstract function methods(): array;
}