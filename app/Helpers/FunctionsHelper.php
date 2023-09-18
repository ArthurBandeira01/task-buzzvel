<?php

use Carbon\Carbon;

if (! function_exists('formatDate')) {
    function formatDate($date)
    {
        return $date->format('m/d/Y');
    }
}
