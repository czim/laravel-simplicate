<?php

namespace Czim\Simplicate\Data;

use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Support\Arrayable;

abstract class AbstractDataObject implements Arrayable
{

    protected function castStringAsDate(?string $date): ?Carbon
    {
        if ( ! $date) {
            return null;
        }

        return new Carbon($date);
    }

    protected function formatDate(?DateTime $dateTime): ?string
    {
        if ( ! $dateTime) {
            return null;
        }

        return $dateTime->format('Y-m-d H:i:s');
    }

}
