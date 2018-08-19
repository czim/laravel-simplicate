<?php

namespace Czim\Simplicate\Contracts\Services;

interface SimplicateDomainInterface
{

    public function path(): string;

    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset);

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit);

    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter);

    /**
     * @param string $sort
     * @return $this
     */
    public function sort(string $sort);

    /**
     * Sort next call in descending order.
     *
     * @return $this
     */
    public function descending();

}
