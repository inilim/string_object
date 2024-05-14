<?php

namespace Inilim\Object\Type\String;

use Inilim\Object\Type\String\Stringable;

/**
 * @method static after()
 */
class BaseString extends Stringable
{
    protected const METHODS_RETURN_STATIC_OBJ = [
        'after', 'afterLast', 'append',
        'ascii', 'basename', 'classBasename',
        'before', 'beforeLast', 'between',
        'betweenFirst', 'camel', 'convertCase',
        'dirname', 'finish', 'kebab',
        'limit', 'lower', 'markdown',
        'inlineMarkdown', 'mask', 'match',
        'numbers', 'padBoth', 'padLeft',
        'padRight', 'pipe', 'plural',
        'pluralStudly', 'prepend', 'remove',
        'reverse', 'repeat', 'replace',
        'replaceArray', 'replaceFirst', 'replaceStart',
        'replaceLast', 'replaceEnd', 'replaceMatches',
        'squish', 'start', 'stripTags',
        'upper', 'title', 'headline',
        'apa', 'transliterate', 'singular',
        'slug', 'snake', 'studly',
        'substr', 'substrReplace', 'swap',
        'trim', 'ltrim', 'rtrim',
        'lcfirst', 'ucfirst', 'words',
        'wordWrap', 'wrap', 'unwrap',
    ];

    /**
     * @param mixed[]|array{} $args
     * @return mixed
     */
    public function __call(string $method, $args)
    {
        if (\in_array($method, self::METHODS_RETURN_STATIC_OBJ, true)) {
            return new static(\_str()->$method($this->v, ...$args));
        }
        return \_str()->$method($this->v, ...$args);
    }

    // ------------------------------------------------------------------
    // 
    // ------------------------------------------------------------------

    /**
     * Convert the string to Base64 encoding.
     */
    public function toBase64(): static
    {
        return new static(\base64_encode($this->v));
    }

    /**
     * Decode the Base64 encoded string.
     */
    public function fromBase64(bool $strict = false): static
    {
        return new static(\base64_decode($this->v, $strict));
    }

    /**
     * Get the underlying string value as an integer.
     */
    public function toInt(int $base = 10): int
    {
        return \intval($this->v, $base);
    }

    /**
     * Get the underlying string value as a float.
     */
    public function toFloat(): float
    {
        return \floatval($this->v);
    }

    /**
     * Get the underlying string value as a boolean.
     *
     * Returns true when value is "1", "true", "on", and "yes". Otherwise, returns false.
     */
    public function toBool(): bool
    {
        return \filter_var($this->v, \FILTER_VALIDATE_BOOLEAN);
    }
}
