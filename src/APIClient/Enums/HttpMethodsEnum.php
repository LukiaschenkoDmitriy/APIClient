<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\Enums;


enum HttpMethodsEnum: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
}