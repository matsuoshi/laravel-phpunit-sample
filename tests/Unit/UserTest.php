<?php

namespace Tests\Unit;

use App\Sample;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SampleTest extends TestCase
{

    /**
     * @group model
     */
    public function testGetTaxIncludedPrice()
    {
        $sample = new Sample();

        $result = $sample->getTaxIncludedPrice(100);

        $this->assertEquals(108, $result);
    }

    /**
     * @group model
     */
    public function testGetTaxExcludedPrice()
    {
        $sample = new Sample();

        $result = $sample->getTaxExcludedPrice(540);

        $this->assertEquals(500, $result);
    }

    /**
     * @group all
     */
    public function testTax()
    {
        $sample = new Sample();

        $result = $sample->getTaxIncludedPrice(100);
        $result = $sample->getTaxExcludedPrice($result);

        $this->assertEquals(100, $result);
    }
}
