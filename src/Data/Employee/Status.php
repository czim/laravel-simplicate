<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;

class Status extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;


    public function __construct(array $data)
    {
        $this->id    = array_get($data, 'id');
        $this->label = array_get($data, 'label');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function toArray(): array
    {
        return [
            'id'    => $this->getId(),
            'label' => $this->getLabel(),
        ];
    }

}
