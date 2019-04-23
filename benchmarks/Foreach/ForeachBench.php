<?php
declare(strict_types=1);

use Lib\IgbinaryLib;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class ForeachBench
 *
 * @BeforeMethods("init")
 */
class ForeachBench
{
    /** @var IgbinaryLib */
    private $array;

    /**
     * @return void
     */
    public function init(): void
    {
        $this->array = \range(0, 100000);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchWithLink(): void
    {
        foreach ($this->array as &$item) {
            $item = true;
        }
        unset($item);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchWithKey(): void
    {
        foreach ($this->array as $key => $value) {
            $this->array[$key] = true;
        }
    }
}
