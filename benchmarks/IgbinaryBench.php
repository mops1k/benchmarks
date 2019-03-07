<?php
declare(strict_types=1);

use Lib\IgbinaryLib;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class SerializeBench
 *
 * @BeforeMethods("init")
 */
class IgbinaryBench
{
    /** @var IgbinaryLib */
    private $igbinaryLib;

    public function init()
    {
        $this->igbinaryLib = new IgbinaryLib([
            'test'  => 123,
            'array' => [1, 2, 3],
        ]);
        $this->igbinaryLib->serialize();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchSerialize()
    {
        $this->igbinaryLib->serialize();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchUnserialize()
    {
        $this->igbinaryLib->unserialize();
    }
}
