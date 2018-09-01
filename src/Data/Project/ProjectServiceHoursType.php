<?php

namespace Czim\Simplicate\Data\Project;

use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class ProjectServiceHoursType extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var ProjectHoursType
     */
    protected $hoursType;

    /**
     * @var int
     */
    protected $budgetedAmount;

    /**
     * @var float
     */
    protected $tariff;

    /**
     * @var bool
     */
    protected $billable;


    public function __construct(array $data)
    {
        $this->id             = Arr::get($data, 'id');
        $this->hoursType      = new ProjectHoursType(Arr::get($data, 'hourstype', []));
        $this->budgetedAmount = (int) Arr::get($data, 'budgeted_amount');
        $this->tariff         = (float) Arr::get($data, 'tariff');
        $this->billable       = (bool) Arr::get($data, 'billable');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getHoursType(): ProjectHoursType
    {
        return $this->hoursType;
    }

    public function getBudgetedAmount(): int
    {
        return $this->budgetedAmount;
    }

    public function getTariff(): float
    {
        return $this->tariff;
    }

    public function isBillable(): bool
    {
        return $this->billable;
    }


    public function toArray(): array
    {
        return [
            'id'              => $this->getId(),
            'hourstype'       => $this->getHoursType()->toArray(),
            'budgeted_amount' => $this->getBudgetedAmount(),
            'tariff'          => $this->getTariff(),
            'billable'        => $this->isBillable(),
        ];
    }

}
