<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\Interfaces;

use Dmytrii\ClientLibrary\APIClient\Enums\HttpMethodsEnum;

interface HttpMethodInterface {
    
    public function getId(): string;
    public function getEndpoint(): string;
    public function getHeader(): array;
    public function getOptions(): array;
    public function getMethod(): HttpMethodsEnum;
    
}