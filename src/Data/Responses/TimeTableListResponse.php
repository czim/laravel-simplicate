<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\TimeTable\TimeTable;
use Illuminate\Support\Collection;

/**
 * Class TimeTableListResponse
 *
 * @method Collection|TimeTable[] getData()
 */
class TimeTableListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new TimeTable($item);
                },
                $data
            )
        );
    }

}
