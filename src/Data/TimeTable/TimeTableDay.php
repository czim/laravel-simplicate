<?php

namespace Czim\Simplicate\Data\TimeTable;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class TimeTableDay extends AbstractDataObject
{

    /**
     * @var float
     */
    protected $startTime;

    /**
     * @var float
     */
    protected $endTime;

    /**
     * @var int
     */
    protected $hours;


    public function __construct(array $data)
    {
        $this->startTime = Arr::get($data, 'start_time', 0.0);
        $this->endTime   = Arr::get($data, 'end_time', 0.0);
        $this->hours     = Arr::get($data, 'hours', 0);
    }


    public function getStartTime(): float
    {
        return $this->startTime;
    }

    public function getEndTime(): float
    {
        return $this->endTime;
    }

    public function getHours(): int
    {
        return $this->hours;
    }


    public function toArray(): array
    {
        return [
            'start_time' => $this->getStartTime(),
            'end_time'   => $this->getEndTime(),
            'hours'      => $this->getHours(),
        ];
    }

}
