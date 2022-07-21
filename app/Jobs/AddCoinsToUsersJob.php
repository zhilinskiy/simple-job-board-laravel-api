<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class AddCoinsToUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle()
    {
        $maxCoins = config('coins.max');
        $oneGo = config('coins.one-go');

        DB::transaction(function () use ($oneGo, $maxCoins) {

            User::where('coins', '<', $maxCoins)
                ->increment('coins', $oneGo);

            User::where('coins', '>', $maxCoins)
                ->update(['coins' => $maxCoins]);
        });
    }
}
