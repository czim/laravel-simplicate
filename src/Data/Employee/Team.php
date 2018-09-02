<?php

namespace Czim\Simplicate\Data\Employee;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Team extends TeamReference
{

    /**
     * @var Collection|EmployeeReference[]
     */
    protected $employees;


    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->employees = new Collection(
            array_map(
                function (array $item) {
                    return new EmployeeReference($item);
                },
                Arr::get($data, 'employees', [])
            )
        );
    }


    /**
     * @return Collection|EmployeeReference[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'employees'   => $this->getEmployees()->toArray(),
        ]);
    }

}
