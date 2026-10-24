<?php

namespace App\Security;

use App\Api\Problem\ErrorCode;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * Why a bearer token was refused, as the contract code the client is told.
 */
final class ApiAuthenticationException extends AuthenticationException
{
    public function __construct(public readonly ErrorCode $errorCode, ?\Throwable $previous = null)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
