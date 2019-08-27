<?php

/*
 * This file is part of the Liquid package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Liquid
 */

namespace Liquid\Iterators;

use IteratorAggregate;

/**
 * Iterator that maps elements using a callable
 */
class MapIterator implements IteratorAggregate {

    /**
     * @var callable $mapping
     */
    protected $mapping;

    /**
     * @var \Traversable $data
     */
    protected $data;

    /**
     * Construct a new MapIterator
     *
     * @param callabla $mapping
     * @param \Traversable $data
     */
    public function __construct(
        callable $mapping,
        \Traversable $data
    ) {
        $this->mapping = $mapping;
        $this->data = $data;

    }

    /**
     * IteratorAggregate implementation
     *
     * @return \Traversable
     */
    public function getIterator() {
        foreach($this->data as $elem) {
            yield $this->mapping($elem);
        }
    }
}
