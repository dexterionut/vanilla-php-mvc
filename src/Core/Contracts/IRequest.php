<?php

namespace App\Core\Contracts;

interface IRequest
{
    public function setUri(): void;

    public function getUri(): string;

    public function setMethod(): void;

    public function getMethod(): string;

    public function getParamValue(string $paramName, $otherWise = NULL);
}