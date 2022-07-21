<?php


use App\Jobs\AddCoinsToUsersJob;
use App\Models\User;

test('', function () {
    config([
        'coins.max' => 5,
        'coins.one-go' => 1,
    ]);
    $user1 = User::factory()->create([
        'coins' => 0,
    ]);
    $user4 = User::factory()->create([
        'coins' => 4,
    ]);
    $user5 = User::factory()->create([
        'coins' => 5,
    ]);

    AddCoinsToUsersJob::dispatch();

    $user1->refresh();
    $user4->refresh();
    $user5->refresh();

    expect($user1->coins)->toBe(1)
        ->and($user4->coins)->toBe(5)
        ->and($user5->coins)->toBe(5);

});
