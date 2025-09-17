<?php

namespace Ramin\TimeSum;

class TimeSum
{
    /**
     * Sum an array of HH:MM:SS time strings
     *
     * @param array $times
     * @return string
     */
    public static function sum(array $times): string
    {
        $totalSeconds = 0;

        foreach ($times as $time) {
            if (!preg_match('/^\d{2}:\d{2}:\d{2}$/', $time)) {
                throw new \InvalidArgumentException("Invalid time format: $time");
            }

            [$h, $m, $s] = explode(':', $time);
            $totalSeconds += $h * 3600 + $m * 60 + $s;
        }

        $hours   = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
