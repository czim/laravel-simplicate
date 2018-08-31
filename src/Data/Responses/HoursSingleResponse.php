<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Hours\Hours;
use Czim\Simplicate\Data\Leave\Leave;

/**
 * Class HoursSingleResponse
 *
 * @method Leave getData()
 */
class HoursSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Hours($data);
    }

}
