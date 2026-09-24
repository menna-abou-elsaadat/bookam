<?php

namespace App\Enums;

enum RentType: string
{
    case Daily = 'daily';
    case Monthly = 'monthly';
    case Yearly = 'yearly';
}
