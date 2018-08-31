<?php

namespace Czim\Simplicate\Data\TimeTable;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class TimeTableWeek extends AbstractDataObject
{

    const MONDAY    = 1;
    const TUESDAY   = 2;
    const WEDNESDAY = 3;
    const THURSDAY  = 4;
    const FRIDAY    = 5;
    const SATURDAY  = 6;
    const SUNDAY    = 7;


    /**
     * @var TimeTableDay[]  keys: 0 to 6
     */
    protected $days;


    public function __construct(array $data)
    {
        $this->days[0] = new TimeTableDay(Arr::get($data, 'day_1', []));
        $this->days[1] = new TimeTableDay(Arr::get($data, 'day_2', []));
        $this->days[2] = new TimeTableDay(Arr::get($data, 'day_3', []));
        $this->days[3] = new TimeTableDay(Arr::get($data, 'day_4', []));
        $this->days[4] = new TimeTableDay(Arr::get($data, 'day_5', []));
        $this->days[5] = new TimeTableDay(Arr::get($data, 'day_6', []));
        $this->days[6] = new TimeTableDay(Arr::get($data, 'day_7', []));
    }

    public function getDayOne(): TimeTableDay
    {
        return $this->days[0];
    }

    public function getDayTwo(): TimeTableDay
    {
        return $this->days[1];
    }

    public function getDayThree(): TimeTableDay
    {
        return $this->days[2];
    }

    public function getDayFour(): TimeTableDay
    {
        return $this->days[3];
    }

    public function getDayFive(): TimeTableDay
    {
        return $this->days[4];
    }

    public function getDaySix(): TimeTableDay
    {
        return $this->days[5];
    }

    public function getDaySeven(): TimeTableDay
    {
        return $this->days[6];
    }

    public function getDay(int $number): TimeTableDay
    {
        if ($number < 1 || $number > 7) {
            throw new \InvalidArgumentException('Number must be 1-7');
        }

        return $this->days[ $number - 1 ];
    }


    public function toArray(): array
    {
        return [
            'day_1' => $this->getDay(1),
            'day_2' => $this->getDay(2),
            'day_3' => $this->getDay(3),
            'day_4' => $this->getDay(4),
            'day_5' => $this->getDay(5),
            'day_6' => $this->getDay(6),
            'day_7' => $this->getDay(7),
        ];
    }

}
