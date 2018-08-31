<?php

namespace Czim\Simplicate\Data\Project;

use Czim\Simplicate\Data\AbstractDataObject;

class OrganizationReference extends AbstractDataObject
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

    public function toArray(): array
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}
