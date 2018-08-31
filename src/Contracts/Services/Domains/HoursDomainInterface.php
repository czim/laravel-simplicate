<?php

namespace Czim\Simplicate\Contracts\Services\Domains;

use Czim\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Czim\Simplicate\Data\Responses\HoursListResponse;
use Czim\Simplicate\Data\Responses\HoursSingleResponse;
use Czim\Simplicate\Data\Responses\HoursTypeListResponse;
use Czim\Simplicate\Data\Responses\HoursTypeSingleResponse;

interface HoursDomainInterface extends SimplicateDomainInterface
{

    public function allHours(): HoursListResponse;

    public function hours(string $id): HoursSingleResponse;

    public function allHoursTypes(): HoursTypeListResponse;

    public function hoursType(string $id): HoursTypeSingleResponse;

}
