<?php

namespace Czim\Simplicate\Data\Project;

use Carbon\Carbon;
use Czim\Simplicate\Data\AbstractDataObject;
use Czim\Simplicate\Data\Hours\VatClass;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Service extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $projectId;

    /**
     * @var Carbon|null
     */
    protected $invoiceDate;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var Collection|ProjectServiceHoursType[]
     */
    protected $hoursTypes;

    /**
     * @var VatClass|null
     */
    protected $vatClass;

    /**
     * @var RevenueGroupReference
     */
    protected $revenueGroup;

    /**
     * @var bool
     */
    protected $invoiceInInstallments;

    /**
     * @var Carbon|null
     */
    protected $createdAt;

    /**
     * @var Carbon|null
     */
    protected $updatedAt;

    /**
     * @var Carbon|null
     */
    protected $writeHoursStartDate;

    /**
     * @var Carbon|null
     */
    protected $startDate;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $invoiceMethod;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var bool
     */
    protected $trackHours;

    /**
     * @var bool
     */
    protected $trackCost;


    public function __construct(array $data)
    {
        $this->id                    = Arr::get($data, 'id');
        $this->projectId             = Arr::get($data, 'project_id');
        $this->invoiceDate           = $this->castStringAsDate(Arr::get($data, 'invoice_date'));
        $this->status                = Arr::get($data, 'status');
        $this->hoursTypes            = new Collection(
            array_map(function (array $data) {
                return new ProjectServiceHoursType($data);
            },
                Arr::get($data, 'hour_types', []))
        );
        $this->vatClass              = new VatClass(Arr::get($data, 'vat_class'));
        $this->revenueGroup          = new RevenueGroupReference(Arr::get($data, 'revenue_group', []));
        $this->invoiceInInstallments = (bool) Arr::get($data, 'invoice_in_installments');
        $this->createdAt             = $this->castStringAsDate(Arr::get($data, 'created_at'));
        $this->updatedAt             = $this->castStringAsDate(Arr::get($data, 'updated_at'));
        $this->writeHoursStartDate   = $this->castStringAsDate(Arr::get($data, 'write_hours_start_date'));
        $this->startDate             = $this->castStringAsDate(Arr::get($data, 'start_date'));
        $this->name                  = Arr::get($data, 'name');
        $this->invoiceMethod         = Arr::get($data, 'invoice_method');
        $this->amount                = (float) Arr::get($data, 'amount');
        $this->trackHours            = (bool) Arr::get($data, 'track_hours');
        $this->trackCost             = (bool) Arr::get($data, 'track_cost');
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getInvoiceDate(): ?Carbon
    {
        return $this->invoiceDate;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return ProjectServiceHoursType[]|Collection
     */
    public function getHoursTypes()
    {
        return $this->hoursTypes;
    }

    public function getVatClass(): ?VatClass
    {
        return $this->vatClass;
    }

    public function getRevenueGroup(): RevenueGroupReference
    {
        return $this->revenueGroup;
    }

    public function isInvoiceInInstallments(): bool
    {
        return $this->invoiceInInstallments;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getWriteHoursStartDate(): ?Carbon
    {
        return $this->writeHoursStartDate;
    }

    public function getStartDate(): ?Carbon
    {
        return $this->startDate;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getInvoiceMethod(): ?string
    {
        return $this->invoiceMethod;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function isTrackHours(): bool
    {
        return $this->trackHours;
    }

    public function isTrackCost(): bool
    {
        return $this->trackCost;
    }


    public function toArray(): array
    {
        return [
            'id'                      => $this->getId(),
            'project_id'              => $this->getProjectId(),
            'invoice_date'            => $this->formatDate($this->getInvoiceDate()),
            'status'                  => $this->getStatus(),
            'hour_types'              => $this->getHoursTypes()->toArray(),
            'vat_class'               => $this->getVatClass()->toArray(),
            'revenue_group'           => $this->getRevenueGroup()->toArray(),
            'invoice_in_installments' => $this->isInvoiceInInstallments(),
            'created_at'              => $this->formatDate($this->getCreatedAt()),
            'updated_at'              => $this->formatDate($this->getUpdatedAt()),
            'write_hours_start_date'  => $this->formatDateOnly($this->getWriteHoursStartDate()),
            'start_date'              => $this->formatDateOnly($this->getStartDate()),
            'name'                    => $this->getName(),
            'invoice_method'          => $this->getInvoiceMethod(),
            'amount'                  => $this->getAmount(),
            'track_hours'             => $this->isTrackHours(),
            'track_cost'              => $this->isTrackCost(),
        ];
    }

}
