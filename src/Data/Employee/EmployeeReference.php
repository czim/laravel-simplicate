<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;

class EmployeeReference extends AbstractDataObject
{

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $personId;

    /**
     * @var string|null
     */
    protected $name;


    public function __construct(array $data)
    {
        $this->id       = array_get($data, 'id');
        $this->personId = array_get($data, 'person_id');
        $this->name     = array_get($data, 'name');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPersonId(): ?string
    {
        return $this->personId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        $array = [
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ];

        if ($this->personId) {
            $array['person_id'] = $this->personId;
        }

        return $array;
    }

}
