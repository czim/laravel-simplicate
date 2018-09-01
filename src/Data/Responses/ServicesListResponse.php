<?php

namespace Czim\Simplicate\Data\Responses;

use Czim\Simplicate\Data\Project\Service;
use Illuminate\Support\Collection;

/**
 * Class ServicesListResponse
 *
 * @method Collection|Service[] getData()
 */
class ServicesListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Service($item);
                },
                $data
            )
        );
    }

}
