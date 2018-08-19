<?php

namespace Czim\Simplicate\Contracts\Services;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;

interface SimplicateClientInterface
{

    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset): SimplicateClientInterface;

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): SimplicateClientInterface;

    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter): SimplicateClientInterface;

    /**
     * @param string $sort
     * @return $this
     */
    public function sort(string $sort): SimplicateClientInterface;

    /**
     * Sort next call in descending order.
     *
     * @return $this
     */
    public function descending(): SimplicateClientInterface;

    public function get(string $path): SimplicateResponseInterface;

    public function post(string $path, array $body): SimplicateResponseInterface;

    public function put(string $path, array $body): SimplicateResponseInterface;

    public function delete(string $path): SimplicateResponseInterface;

    /**
     * @param string $class
     * @return $this
     */
    public function responseClass(string $class): SimplicateClientInterface;

}
