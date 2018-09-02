<?php

namespace Czim\Simplicate\Data\Leave;

use Illuminate\Support\Arr;

class LeaveType extends LeaveTypeReference
{

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
        parent::__construct($data);

        $this->blocked = (bool) Arr::get($data, 'blocked');
        $this->color   = Arr::get($data, 'color');
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
        return array_merge(parent::toArray(), [
            'blocked' => $this->isBlocked(),
            'color'   => $this->getColor(),
        ]);
    }

}
