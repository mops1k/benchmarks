<?php
declare(strict_types=1);

use Lib\SerializeLib;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class SerializeBench
 */
class SerializeBench
{
    /** @var SerializeLib */
    private $serializeLib;

    public function __construct()
    {
        $this->serializeLib = new SerializeLib([
            'test'  => 123,
            'array' => [1, 2, 3],
        ]);
        $this->serializeLib->serialize();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchSerialize()
    {
        $this->serializeLib->serialize();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchUnserialize()
    {
        $this->serializeLib->unserialize();
    }
}
