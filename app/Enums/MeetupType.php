<?php

namespace App\Enums;

enum MeetupType: int
{
    case REHEARSAL = 1;
    case LIVE_SHOW = 2;

    public function label(): string
    {
        return match($this) {
            self::REHEARSAL => 'репетиция',
            self::LIVE_SHOW => 'участие',
        };
    }
}
