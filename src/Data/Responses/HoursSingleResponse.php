<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Hours\Hours;

/**
 * Class HoursSingleResponse
 *
 * @method Hours getData()
 */
class HoursSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Hours($data);
    }

}
