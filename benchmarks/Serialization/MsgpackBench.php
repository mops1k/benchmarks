<?php
declare(strict_types=1);

use Lib\MsgPackLib;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class SerializeBench
 */
class MsgpackBench
{
    /**
     * @var MsgPackLib
     */
    private $msgPackLib;

    public function __construct()
    {
        $this->msgPackLib = new MsgPackLib([
            'test'  => 123,
            'array' => [1, 2, 3],
        ]);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchSerialize()
    {
        $this->msgPackLib->serialize();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchUnserialize()
    {
        $this->msgPackLib->unserialize();
    }
}
