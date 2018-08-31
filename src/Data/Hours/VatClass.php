<?php

namespace Czim\Simplicate\Data\Hours;

use Czim\Simplicate\Data\AbstractDataObject;

class VatClass extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var int
     */
    protected $percentage;


    public function __construct(array $data)
    {
        $this->id         = array_get($data, 'id');
        $this->label      = array_get($data, 'label');
        $this->percentage = array_get($data, 'percentage', 0);
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->getId(),
            'label'      => $this->getLabel(),
            'percentage' => $this->getPercentage(),
        ];
    }

}
