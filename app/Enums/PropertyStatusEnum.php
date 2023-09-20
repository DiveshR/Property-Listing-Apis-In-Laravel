<?php

namespace App\Enums;

enum PropertyStatusEnum: string
{
    case SOLD = 'Sold';
    case SALE = 'On Sail';
    case HOLD = 'On Hold';
}
