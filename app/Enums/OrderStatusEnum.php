<?php
namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case INVALID = 'invalid';
    case APPROVED = 'approved';
    case CANCELLED = 'cancelled';
}
