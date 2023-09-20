<?php

namespace App\Enums;

enum PropertyTypeEnum: string
{
    case SINGLE = 'Single-family Home';
    case TOWNHOUSE = 'Townhouse';
    case MULTIFAMILY = 'Multifamily';
    case BUNGALOW = 'Net Listing';
}
