<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Employee\Team;

/**
 * Class TeamSingleResponse
 *
 * @method Team() getData()
 */
class TeamSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Team($data);
    }

}
