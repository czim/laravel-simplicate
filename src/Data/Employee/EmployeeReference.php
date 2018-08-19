<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;

class EmployeeReference extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;


    public function __construct(array $data)
    {
        $this->id   = array_get($data, 'id');
        $this->name = array_get($data, 'name');
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}
