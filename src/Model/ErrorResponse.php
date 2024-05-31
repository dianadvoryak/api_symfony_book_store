<?php

namespace App\Model;

use OpenApi\Attributes as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class ErrorResponse
{
    public function __construct(private string $message, private mixed $details = null)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    #[OA\Property(type: 'object', nullable: true, oneOf: [
        new OA\Schema(ref: new Model(type: ErrorDebugDetails::class)),
        new OA\Schema(ref: new Model(type: ErrorValidationDetails::class))]
    )]
    public function getDetails(): mixed
    {
        return $this->details;
    }

}
