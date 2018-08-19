<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Leave\Leave;
use Illuminate\Support\Collection;

/**
 * Class LeaveListResponse
 *
 * @method Collection|Leave[] getData()
 */
class LeaveListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Leave($item);
                },
                $data
            )
        );
    }

}
