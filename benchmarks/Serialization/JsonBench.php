<?php
declare(strict_types=1);

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class JsonBench
 */
class JsonBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchEncode()
    {
        $array = [
            'test' => 123,
            'array' => [1, 2, 3]
        ];
        \json_encode($array);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchDecode()
    {
        $array = [
            'test' => 123,
            'array' => [1, 2, 3]
        ];
        $jsonString = \json_encode($array);
        \json_decode($jsonString, true);
    }
}
