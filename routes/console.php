<?php

use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


Schedule::command('db:seed --force')->twiceDaily(1, 13)->timezone('Europe/Amsterdam');

Schedule::command('sitemap:generate')->weekly();
