<?php

namespace Czim\Simplicate\Data\Employee;

use Carbon\Carbon;
use Czim\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Employee extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool
     */
    protected $isUser = false;

    /**
     * @var Collection|TeamReference[]
     */
    protected $teams;

    /**
     * @var EmployeeReference
     */
    protected $supervisor;

    /**
     * @var Person
     */
    protected $person;

    /**
     * @var Status
     */
    protected $status;

    /**
     * @var string
     */
    protected $personId;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $function;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @var string
     */
    protected $employmentStatus;

    /**
     * @var string
     */
    protected $workPhone;

    /**
     * @var string
     */
    protected $workMobile;

    /**
     * @var string
     */
    protected $workEmail;

    /**
     * @var float
     */
    protected $hourlySalesTariff;

    /**
     * @var float
     */
    protected $hourlyCostTariff;

    /**
     * @var Avatar
     */
    protected $avatar;

    /**
     * @var Carbon
     */
    protected $created;

    /**
     * @var Carbon|null
     */
    protected $modified;

    /**
     * @var Carbon|null
     */
    protected $updatedAt;

    /**
     * @var Carbon
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $simplicateUrl;


    public function __construct(array $data)
    {
        $this->id                = Arr::get($data, 'id');
        $this->isUser            = (bool) Arr::get($data, 'is_user');
        $this->teams             = new Collection(
            array_map(function (array $data) {
                return new TeamReference($data);
            },
            Arr::get($data, 'teams', []))
        );
        $this->supervisor        = new EmployeeReference(Arr::get($data, 'supervisor', []));
        $this->person            = new Person(Arr::get($data, 'person', []));
        $this->status            = new Status(Arr::get($data, 'status', []));
        $this->personId          = Arr::get($data, 'person_id');
        $this->name              = Arr::get($data, 'name');
        $this->function          = Arr::get($data, 'function');
        $this->type              = new Type(Arr::get($data, 'type', []));
        $this->employmentStatus  = Arr::get($data, 'employment_status');
        $this->workPhone         = Arr::get($data, 'work_phone');
        $this->workMobile        = Arr::get($data, 'work_mobile');
        $this->workEmail         = Arr::get($data, 'work_email');
        $this->hourlySalesTariff = (float) Arr::get($data, 'hourly_sales_tariff');
        $this->hourlyCostTariff  = (float) Arr::get($data, 'hourly_cost_tariff');
        $this->avatar            = new Avatar(Arr::get($data, 'avatar', []));
        $this->created           = $this->castStringAsDate(Arr::get($data, 'created'));
        $this->createdAt         = $this->castStringAsDate(Arr::get($data, 'created_at'));
        $this->modified          = $this->castStringAsDate(Arr::get($data, 'modified'));
        $this->updatedAt         = $this->castStringAsDate(Arr::get($data, 'updated_at'));
        $this->simplicateUrl     = Arr::get($data, 'simplicate_url');
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isUser(): bool
    {
        return $this->isUser;
    }

    /**
     * @return TeamReference[]|Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    public function getSupervisor(): EmployeeReference
    {
        return $this->supervisor;
    }

    public function getPerson(): Person
    {
        return $this->person;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPersonId(): string
    {
        return $this->personId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getEmploymentStatus(): string
    {
        return $this->employmentStatus;
    }

    public function getWorkPhone(): string
    {
        return $this->workPhone;
    }

    public function getWorkMobile(): string
    {
        return $this->workMobile;
    }

    public function getWorkEmail(): string
    {
        return strtolower($this->workEmail);
    }

    public function getHourlySalesTariff(): float
    {
        return $this->hourlySalesTariff;
    }

    public function getHourlyCostTariff(): float
    {
        return $this->hourlyCostTariff;
    }

    public function getAvatar(): Avatar
    {
        return $this->avatar;
    }

    public function getCreated(): Carbon
    {
        return $this->created;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getModified(): ?Carbon
    {
        return $this->modified;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getSimplicateUrl(): string
    {
        return $this->simplicateUrl;
    }

    public function toArray(): array
    {
        return [
            'id'                  => $this->getId(),
            'is_user'             => $this->isUser(),
            'teams'               => $this->getTeams()->toArray(),
            'supervisor'          => $this->getSupervisor()->toArray(),
            'person'              => $this->getPerson()->toArray(),
            'status'              => $this->getStatus()->toArray(),
            'person_id'           => $this->getPersonId(),
            'name'                => $this->getName(),
            'function'            => $this->getFunction(),
            'type'                => $this->getType()->toArray(),
            'employment_status'   => $this->getEmploymentStatus(),
            'work_phone'          => $this->getWorkPhone(),
            'work_mobile'         => $this->getWorkMobile(),
            'work_email'          => $this->getWorkEmail(),
            'hourly_sales_tariff' => $this->getHourlySalesTariff(),
            'hourly_cost_tariff'  => $this->getHourlyCostTariff(),
            'avatar'              => $this->getAvatar()->toArray(),
            'created'             => $this->formatDate($this->getCreated()),
            'created_at'          => $this->formatDate($this->getCreatedAt()),
            'modified'            => $this->formatDate($this->getCreated()),
            'updated_at'          => $this->formatDate($this->getCreatedAt()),
            'simplicate_url'      => $this->getSimplicateUrl(),
        ];
    }

}
