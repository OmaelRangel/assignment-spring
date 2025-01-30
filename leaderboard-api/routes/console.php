<?php
use Illuminate\Support\Facades\Schedule;

Schedule::command('declare:winner')->everyFiveMinutes();



