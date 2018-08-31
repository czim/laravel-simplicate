<?php

namespace Czim\Simplicate\Data\CustomField;

use Czim\Simplicate\Data\AbstractDataObject;

class CustomField extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $label;

    /**
     * @var string
     */
    protected $renderType;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    protected $valueType;

    /**
     * @var array
     */
    protected $options;


    public function __construct(array $data)
    {
        $this->id         = array_get($data, 'id');
        $this->name       = array_get($data, 'name');
        $this->label      = array_get($data, 'label');
        $this->renderType = array_get($data, 'render_type');
        $this->position   = (int) array_get($data, 'position');
        $this->valueType  = array_get($data, 'valueType');
        $this->options    = array_get($data, 'options', []);
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getRenderType(): string
    {
        return $this->renderType;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getValueType(): string
    {
        return $this->valueType;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->getId(),
            'name'        => $this->getName(),
            'label'       => $this->getLabel(),
            'render_type' => $this->getRenderType(),
            'position'    => $this->getPosition(),
            'value_type'  => $this->getValueType(),
            'options'     => $this->getOptions(),
        ];
    }

}
