<?php

namespace Czim\Simplicate\Data\Leave;

use Carbon\Carbon;
use Czim\Simplicate\Data\AbstractDataObject;
use Czim\Simplicate\Data\Employee\EmployeeReference;

class Leave extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var EmployeeReference
     */
    protected $employee;

    /**
     * @var LeaveTypeReference
     */
    protected $leaveType;

    /**
     * @var Carbon
     */
    protected $created;

    /**
     * @var Carbon|null
     */
    protected $modified;

    /**
     * @var Carbon|null
     */
    protected $updatedAt;

    /**
     * @var Carbon
     */
    protected $createdAt;

    /**
     * @var Carbon
     */
    protected $startDate;

    /**
     * @var Carbon
     */
    protected $endDate;

    /**
     * @var string
     */
    protected $year;

    /**
     * Negative value (effect on hours worked, or something like that).
     *
     * @var integer
     */
    protected $hours;

    /**
     * @var string
     */
    protected $description;


    public function __construct(array $data)
    {
        $this->id          = array_get($data, 'id');
        $this->employee    = new EmployeeReference(array_get($data, 'employee'));
        $this->leaveType   = new LeaveTypeReference(array_get($data, 'leavetype'));
        $this->created     = new Carbon(array_get($data, 'created'));
        $this->createdAt   = new Carbon(array_get($data, 'created_at'));
        $this->modified    = $this->castStringAsDate(array_get($data, 'modified'));
        $this->updatedAt   = $this->castStringAsDate(array_get($data, 'updated_at'));
        $this->startDate   = new Carbon(array_get($data, 'start_date'));
        $this->endDate     = new Carbon(array_get($data, 'end_date'));
        $this->year        = array_get($data, 'year');
        $this->hours       = array_get($data, 'hours');
        $this->description = array_get($data, 'description') ?: '';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmployee(): EmployeeReference
    {
        return $this->employee;
    }

    public function getLeaveType(): LeaveTypeReference
    {
        return $this->leaveType;
    }

    public function getCreated(): Carbon
    {
        return $this->created;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getModified(): ?Carbon
    {
        return $this->modified;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }

    public function getEndDate(): Carbon
    {
        return $this->endDate;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->getId(),
            'employee'    => $this->getEmployee()->toArray(),
            'leavetype'   => $this->getLeaveType()->toArray(),
            'created'     => $this->formatDate($this->getCreated()),
            'created_at'  => $this->formatDate($this->getCreatedAt()),
            'modified'    => $this->formatDate($this->getCreated()),
            'updated_at'  => $this->formatDate($this->getCreatedAt()),
            'start_date'  => $this->formatDate($this->getStartDate()),
            'end_date'    => $this->formatDate($this->getEndDate()),
            'year'        => $this->getYear(),
            'hours'       => $this->getHours(),
            'description' => $this->getDescription(),
        ];
    }

}
