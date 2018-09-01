<?php

namespace Czim\Simplicate\Data\Project;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

/**
 * Class ProjectHoursType
 *
 * The HoursType nested under a ProjectServiceHoursType.
 */
class ProjectHoursType extends AbstractDataObject
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
     * @var string|null
     */
    protected $label;

    /**
     * @var bool
     */
    protected $blocked;

    /**
     * @var string|null
     */
    protected $color;


    public function __construct(array $data)
    {
        $this->id      = Arr::get($data, 'id');
        $this->type    = Arr::get($data, 'type');
        $this->label   = Arr::get($data, 'label');
        $this->blocked = (bool) Arr::get($data, 'blocked');
        $this->color   = Arr::get($data, 'color');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function toArray(): array
    {
        return [
            'ip'      => $this->getId(),
            'type'    => $this->getType(),
            'label'   => $this->getLabel(),
            'blocked' => $this->isBlocked(),
            'color'   => $this->getColor(),
        ];
    }

}
