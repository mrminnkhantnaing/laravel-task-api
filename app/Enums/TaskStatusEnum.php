<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case TODO = 'todo';
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case ARCHIVED = 'archived';

    public static function getValues(): array
    {
        return [
            self::TODO,
            self::PENDING,
            self::IN_PROGRESS,
            self::COMPLETED,
            self::ARCHIVED,
        ];
    }
}
