<?php

namespace Czim\Simplicate\Data\Employee;

use Carbon\Carbon;
use Czim\Simplicate\Data\AbstractDataObject;

class Person extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var Carbon|null
     */
    protected $dateOfBirth;

    /**
     * Whether the date of birth's year is given.
     *
     * @var bool
     */
    protected $dateOfBirthHasYear = true;

    /**
     * @var string
     */
    protected $genderId;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var string
     */
    protected $fullName;


    public function __construct(array $data)
    {
        $dateOfBirth = array_get($data, 'date_of_birth');

        if (is_string($dateOfBirth)) {

            if ($dateOfBirth == '0000-00-00') {
                $dateOfBirth = null;
            } elseif (preg_match('#^-?0000(.*)$#', $dateOfBirth, $matches)) {
                $dateOfBirth = '1900' . $matches[1];
            }
        }


        $this->id          = array_get($data, 'id');
        $this->dateOfBirth = $dateOfBirth ? new Carbon($dateOfBirth) : null;
        $this->genderId    = array_get($data, 'gender_id');
        $this->gender      = array_get($data, 'gender');
        $this->address     = new Address(array_get($data, 'address', []));
        $this->fullName    = array_get($data, 'full_name');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getDateOfBirth(): ?Carbon
    {
        return $this->dateOfBirth;
    }

    public function isDateOfBirthYearGiven(): bool
    {
        return $this->dateOfBirthHasYear;
    }

    public function getGenderId(): string
    {
        return $this->genderId;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function toArray(): array
    {
        $dateOfBirth = $this->formatDate($this->getDateOfBirth());

        if ($dateOfBirth !== null && ! $this->isDateOfBirthYearGiven()) {
            $dateOfBirth = '0000' . substr($dateOfBirth, 4);
        }

        return [
            'id'            => $this->getId(),
            'date_of_birth' => $dateOfBirth,
            'gender_id'     => $this->getGenderId(),
            'gender'        => $this->getGender(),
            'address'       => $this->getAddress()->toArray(),
            'full_name'     => $this->getFullName(),
        ];
    }

}
