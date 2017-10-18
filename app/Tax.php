<?php

namespace App;

class Tax
{
    // 税率
    const TAX_RATE_PERCENTAGE = 8;

    /**
     * 税込金額を返す
     * @param int $price
     * @return int
     */
    public function getTaxIncludedPrice(int $price) : int
    {
        return floor($price * (100 + self::TAX_RATE_PERCENTAGE) / 100);
    }

    /**
     * 税抜き金額を返す
     * @param $price
     * @return int
     */
    public function getTaxExcludedPrice($price) : int
    {
        return round($price * 100 / (100 + self::TAX_RATE_PERCENTAGE));
    }
}
