<?php

namespace Czim\Simplicate\Data\Employee;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class EmploymentType extends AbstractDataObject
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
     * @var bool
     */
    protected $blocked;


    public function __construct(array $data)
    {
        $this->id      = Arr::get($data, 'id');
        $this->name    = Arr::get($data, 'name');
        $this->blocked = (bool) Arr::get($data, 'blocked');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    public function toArray(): array
    {
        return [
            'id'      => $this->getId(),
            'name'    => $this->getName(),
            'blocked' => $this->isBlocked(),
        ];
    }

}
