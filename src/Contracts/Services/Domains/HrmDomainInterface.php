<?php

namespace Czim\Simplicate\Contracts\Services\Domains;

use Czim\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Czim\Simplicate\Data\Responses\LeaveListResponse;
use Czim\Simplicate\Data\Responses\LeaveSingleResponse;

interface HrmDomainInterface extends SimplicateDomainInterface
{

    public function allLeave(): LeaveListResponse;

    public function leave(string $id): LeaveSingleResponse;

    //public function addLeave(...): ...;
    
}
