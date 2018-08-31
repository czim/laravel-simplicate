<?php

namespace Czim\Simplicate\Data\Hours;

use Czim\Simplicate\Data\AbstractDataObject;

class Type extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var VatClass
     */
    protected $vatClass;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var float|null
     */
    protected $tariff;


    public function __construct(array $data)
    {
        $this->id       = array_get($data, 'id');
        $this->type     = array_get($data, 'type');
        $this->vatClass = new VatClass(array_get($data, 'vatclass', []));
        $this->label    = array_get($data, 'label');
        $this->tariff   = array_has($data, 'tariff') ? (float) array_get($data, 'tariff') : null;
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getVatClass(): VatClass
    {
        return $this->vatClass;
    }

    public function getTariff(): ?float
    {
        return $this->tariff;
    }

    public function toArray(): array
    {
        return [
            'id'       => $this->getId(),
            'type'     => $this->getType(),
            'vatclass' => $this->getVatClass()->toArray(),
            'label'    => $this->getLabel(),
            'tariff'   => $this->getTariff(),
        ];
    }

    public function getLabel(): string
    {
        return $this->label;
    }

}
