<?php

namespace Czim\Simplicate\Data\Service;

use Czim\Simplicate\Data\AbstractDataObject;

class ServiceReference extends AbstractDataObject
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
     * @var string|null
     */
    protected $defaultServiceId;

    /**
     * @var string|null
     */
    protected $revenueGroupId;


    public function __construct(array $data)
    {
        $this->id               = array_get($data, 'id');
        $this->name             = array_get($data, 'name');
        $this->defaultServiceId = array_get($data, 'default_service_id');
        $this->revenueGroupId   = array_get($data, 'revenue_group_id');
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDefaultServiceId(): ?string
    {
        return $this->defaultServiceId;
    }

    public function getRevenueGroupId(): ?string
    {
        return $this->revenueGroupId;
    }

    public function toArray(): array
    {
        $array = [
            'id'                 => $this->getId(),
            'name'               => $this->getName(),
            'default_service_id' => $this->getDefaultServiceId(),
            'revenue_group_id'   => $this->getRevenueGroupId(),
        ];

        return $array;
    }

}
