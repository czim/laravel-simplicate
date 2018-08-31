<?php

namespace Czim\Simplicate\Data\Hours;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class TypeReference extends AbstractDataObject
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
        $this->id       = Arr::get($data, 'id');
        $this->type     = Arr::get($data, 'type');
        $this->vatClass = new VatClass(Arr::get($data, 'vatclass', []));
        $this->label    = Arr::get($data, 'label');
        $this->tariff   = Arr::has($data, 'tariff') ? (float) Arr::get($data, 'tariff') : null;
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

    public function getLabel(): string
    {
        return $this->label;
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

}
