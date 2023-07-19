<?php
namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case FOR_REVIEW = 'for review';
    case INVALID = 'invalid';
    case APPROVED = 'approved';
    case CANCELLED = 'cancelled';
}
