<?php

namespace Czim\Simplicate\Data\Leave;

use Carbon\Carbon;
use Czim\Simplicate\Data\AbstractDataObject;
use Czim\Simplicate\Data\Employee\EmployeeReference;
use Illuminate\Support\Arr;

class LeaveBalance extends AbstractDataObject
{

    /**
     * @var EmployeeReference
     */
    protected $employee;

    /**
     * @var int
     */
    protected $balance;

    /**
     * @var Carbon|null
     */
    protected $firstChange;

    /**
     * @var Carbon|null
     */
    protected $lastChange;

    /**
     * @var int
     */
    protected $year;

    /**
     * @var LeaveTypeReference
     */
    protected $leaveType;


    public function __construct(array $data)
    {
        $this->employee    = new EmployeeReference(Arr::get($data, 'employee'));
        $this->balance     = (int) Arr::get($data, 'balance');
        $this->firstChange = $this->castStringAsDate(Arr::get($data, 'first_change'));
        $this->lastChange  = $this->castStringAsDate(Arr::get($data, 'last_change'));
        $this->year        = (int) Arr::get($data, 'year');
        $this->leaveType   = new LeaveTypeReference(Arr::get($data, 'leavetype', []));
    }


    public function getEmployee(): EmployeeReference
    {
        return $this->employee;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getFirstChange(): ?Carbon
    {
        return $this->firstChange;
    }

    public function getLastChange(): ?Carbon
    {
        return $this->lastChange;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getLeaveType(): LeaveTypeReference
    {
        return $this->leaveType;
    }

    public function toArray(): array
    {
        return [
            'employee'     => $this->getEmployee()->toArray(),
            'balance'      => $this->getBalance(),
            'first_change' => $this->formatDate($this->getFirstChange()),
            'last_change'  => $this->formatDate($this->getLastChange()),
            'year'         => $this->getYear(),
            'leavetype'    => $this->getLeaveType()->toArray(),
        ];
    }

}
