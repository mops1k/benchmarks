<?php
declare(strict_types=1);

namespace Lib;

/**
 * Class SeializeLib
 */
class SerializeLib implements \Serializable
{
    public function __construct(array $normalized)
    {
        $this->normalized = $normalized;
    }

    /**
     * @var mixed
     */
    public $serialized;

    /**
     * @var array
     */
    public $normalized = [];

    /**
     * @inheritdoc
     */
    public function serialize()
    {
        return $this->serialized = \serialize($this->normalized);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized = null)
    {
        return \unserialize($this->serialized);
    }
}
