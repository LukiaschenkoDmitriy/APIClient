<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\HttpMethods;

use Dmytrii\ClientLibrary\APIClient\Enums\HttpMethodsEnum;

class HttpGetTripMethod extends AbstractHttpMethod {
    public const METHODNAME = "TRIP";
    public function __construct(array $data = []) {
        parent::__construct($data);
    }
    public function getMethod(): HttpMethodsEnum {
        return HttpMethodsEnum::GET;
    }

    public function getId(): string {
        return static::METHODNAME;
    }
    
    public function getEndpoint(): string {
        return "/trips/{trip_id}";
    }
    
    public function getOptions(): array {
        return [];
    }
    public function getHeader(): array {
        return [];
    }

}