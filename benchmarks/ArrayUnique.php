<?php
declare(strict_types=1);

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class ArrayUnique
 */
class ArrayUnique
{
    private $array = ['a', 'b', 'c', 'b', 'd', 'a'];
    /**
     * @Revs(1000)
     * @Iterations(100)
     */
    public function benchUnique()
    {
        array_unique($this->array);
    }

    /**
     * @Revs(1000)
     * @Iterations(100)
     */
    public function benchFlipUnique()
    {
        array_flip(array_flip($this->array));
    }

    /**
     * @Revs(1000)
     * @Iterations(100)
     */
    public function benchForeachUnique()
    {
        $uniqueArray = [];
        foreach ($this->array as $key => $value) {
            if (\in_array($value, $uniqueArray, true)) {
                continue;
            }

            $uniqueArray[$key] = $value;
        }
    }
}
