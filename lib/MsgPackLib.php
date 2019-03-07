<?php
declare(strict_types=1);

namespace Lib;

/**
 * Class SeializeLib
 */
class MsgPackLib implements \Serializable
{
    public function __construct(array $normalized)
    {
        $this->normalized = $normalized;
        $this->serialize();
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
        return $this->serialized = \msgpack_pack($this->normalized);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized = null)
    {
        return \msgpack_unpack($this->serialized);
    }
}
