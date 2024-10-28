<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\HttpMethods;

use Dmytrii\ClientLibrary\APIClient\Enums\HttpMethodsEnum;

class HttpPostTripMethod extends AbstractHttpMethod {
    public const METHODNAME = "TRIP.POST";
    public function __construct(array $data = []) {
        parent::__construct($data);
    }
    public function getMethod(): HttpMethodsEnum {
        return HttpMethodsEnum::POST;
    }

    public function getId(): string {
        return static::METHODNAME;
    }
    
    public function getEndpoint(): string {
        return "/trips";
    }
    
    public function getOptions(): array {
        return [
            "from" => $this->data["from"],
            "to" => $this->data["to"],
            "date" => $this->data["date"],
            "passengers" => $this->data["passengers"]
        ];
    }
    public function getHeader(): array {
        return [
            "Content-Type" => "application/json; charset=UTF-8",
            "Accept" => "application/json"
        ];
    }

}