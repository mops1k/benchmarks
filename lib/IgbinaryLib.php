<?php
declare(strict_types=1);

namespace Lib;

/**
 * Class SeializeLib
 */
class IgbinaryLib implements \Serializable
{
    public function __construct(array $normalized)
    {
        $this->normalized = $normalized;
    }

    /**
     * @var string
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
        return $this->serialized = \igbinary_serialize($this->normalized);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized = null)
    {
        return \igbinary_unserialize($this->serialized);
    }
}
