<?php

namespace Inilim\Object\Type\String;

use JsonSerializable;
use ArrayAccess;
use Stringable as BaseStringable;

/**
 */
class Stringable implements JsonSerializable, ArrayAccess, BaseStringable
{
    protected string $v;

    public function __construct(string $value = '')
    {
        $this->v = $value;
    }

    /**
     * Convert the object to a string when JSON encoded.
     */
    public function jsonSerialize(): string
    {
        return $this->__toString();
    }

    /**
     * Determine if the given offset exists.
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->v[$offset]);
    }

    /**
     * Get the value at the given offset.
     */
    public function offsetGet(mixed $offset): string
    {
        return $this->v[$offset];
    }

    /**
     * Set the value at the given offset.
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->v[$offset] = $value;
    }

    /**
     * Unset the value at the given offset.
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->v[$offset]);
    }

    /**
     * Get the raw string value.
     */
    public function __toString(): string
    {
        return $this->v;
    }

    /**
     * Get the underlying string value.
     */
    public function value(): string
    {
        return $this->toString();
    }

    /**
     * Get the underlying string value.
     */
    public function toString(): string
    {
        return $this->v;
    }
}
