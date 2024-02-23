<?php

if (!function_exists('formatPrice')) {
    /**
     * Format price to Indonesian Rupiah.
     *
     * @param float $price
     * @return string
     */
    function formatPrice($price)
    {
        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}
