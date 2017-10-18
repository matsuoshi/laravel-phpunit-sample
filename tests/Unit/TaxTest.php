<?php

namespace Tests\Unit;

use App\Tax;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxTest extends TestCase
{
    /**
     * 税込みテスト
     * @group model
     */
    public function testGetTaxIncludedPrice()
    {
        $sample = new Tax();

        $result = $sample->getTaxIncludedPrice(100);

        $this->assertEquals(108, $result);
    }

    /**
     * 税抜きテスト
     * @group model
     */
    public function testGetTaxExcludedPrice()
    {
        $sample = new Tax();

        $result = $sample->getTaxExcludedPrice(540);

        $this->assertEquals(500, $result);
    }

    /**
     * 税込み→税抜き テスト
     * @group combi
     */
    public function testTax()
    {
        $sample = new Tax();

        $result = $sample->getTaxIncludedPrice(100);
        $result = $sample->getTaxExcludedPrice($result);

        $this->assertEquals(100, $result);
    }
}
