<?php
function truncateWhitespaces($v)
{
   return is_string($v) ? trim(preg_replace('/\s*\R\s*/', ' ', $v)) : $v;
}

/**
 * € has exponent=2 meaning 10^2 cents in 1€, JPY has exponent 0
 * @param $price
 * @param $currencyExponent
 * @return int
 */
function priceToInt($price, int $currencyExponent = 2): int
{
   return intval(floatval($price) * pow(10, $currencyExponent));
}

/**
 * € has exponent=2 meaning 10^2 cents in 1€, JPY has exponent 0
 * @param $cents
 * @param $currencyExponent
 * @return float
 */
function centsToPrice( $cents, int $currencyExponent = 2)
{
   return floatval($cents)/floatval(pow(10, $currencyExponent ));
}
