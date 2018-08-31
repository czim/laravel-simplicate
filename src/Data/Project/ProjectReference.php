<?php

namespace Czim\Simplicate\Data\Project;

use Czim\Simplicate\Data\AbstractDataObject;

class ProjectReference extends AbstractDataObject
{

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var OrganizationReference|null
     */
    protected $organization;


    public function __construct(array $data)
    {
        $this->id           = array_get($data, 'id');
        $this->name         = array_get($data, 'name');
        $this->organization = new OrganizationReference(array_get($data, 'organization', []));
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getOrganization(): ?OrganizationReference
    {
        return $this->organization;
    }

    public function toArray(): array
    {
        $array = [
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ];

        if ($this->organization) {
            $array['organization'] = $this->organization->toArray();
        }

        return $array;
    }

}
