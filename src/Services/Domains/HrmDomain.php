<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\Domains\HrmDomainInterface;
use Czim\Simplicate\Data\Responses\EmployeeListResponse;
use Czim\Simplicate\Data\Responses\EmployeeSingleResponse;
use Czim\Simplicate\Data\Responses\LeaveListResponse;
use Czim\Simplicate\Data\Responses\LeaveSingleResponse;
use Czim\Simplicate\Data\Responses\TimeTableListResponse;

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
     * @return SimplicateResponseInterface|EmployeeListResponse
     */
    public function allEmployees(): EmployeeListResponse
    {
        return $this->client->responseClass(EmployeeListResponse::class)
            ->get($this->prefixPath('employee'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|EmployeeSingleResponse
     */
    public function employee(string $id): EmployeeSingleResponse
    {
        return $this->client->responseClass(EmployeeSingleResponse::class)
            ->get($this->prefixPath('employee/' . $id));
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

    /**
     * @return SimplicateResponseInterface|TimeTableListResponse
     */
    public function timeTables(): TimeTableListResponse
    {
        return $this->client->responseClass(TimeTableListResponse::class)
            ->get($this->prefixPath('timetable'));
    }

}
