<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\Domains\HrmDomainInterface;
use Czim\Simplicate\Data\Responses\LeaveListResponse;
use Czim\Simplicate\Data\Responses\LeaveSingleResponse;

class HrmDomain extends AbstractDomain implements HrmDomainInterface
{

    /**
     * @return string
     */
    public function path(): string
    {
        return 'hrm';
    }

    /**
     * @return SimplicateResponseInterface|LeaveListResponse
     */
    public function allLeave(): LeaveListResponse
    {
        return $this->client->responseClass(LeaveListResponse::class)
            ->get($this->prefixPath('leave'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|LeaveSingleResponse
     */
    public function leave(string $id): LeaveSingleResponse
    {
        return $this->client->responseClass(LeaveSingleResponse::class)
            ->get($this->prefixPath('leave/' . $id));
    }

}
