<?php

namespace App\Enums;

enum ListingTypeEnum : string {

    case OPEN = 'Open Listing';
    Case SELL = 'Sell Listing';
    case EXECLUSIVE = 'Execlusive Agency Listings';
    case NET = 'Net Listings';
}