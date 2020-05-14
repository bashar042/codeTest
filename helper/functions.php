<?php
function convertCurrency($amount, $currency)
{
    $rate = @json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'), true)['rates'][$currency];
    if ($currency == 'EUR' || $rate == 0) {
        $amntFixed = $amount;
    }
    if ($currency != 'EUR' || $rate > 0) {
        $amntFixed = $amount / $rate;
    }
    return $amntFixed;
}

function isEu($c)
{
    $result = false;
    switch ($c) {
        case 'AT':
        case 'BE':
        case 'BG':
        case 'CY':
        case 'CZ':
        case 'DE':
        case 'DK':
        case 'EE':
        case 'ES':
        case 'FI':
        case 'FR':
        case 'GR':
        case 'HR':
        case 'HU':
        case 'IE':
        case 'IT':
        case 'LT':
        case 'LU':
        case 'LV':
        case 'MT':
        case 'NL':
        case 'PO':
        case 'PT':
        case 'RO':
        case 'SE':
        case 'SI':
        case 'SK':
            return true;
        default:
            $result = false;
    }
    return $result;
}