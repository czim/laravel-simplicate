<?php

namespace Czim\Simplicate\Contracts\Data;

interface SimplicateResponseInterface
{

    /**
     * @return mixed
     */
    public function getData();

    public function getErrors(): ?array;

    public function getDebug(): ?string;

    public function getStatusCode(): int;

}
