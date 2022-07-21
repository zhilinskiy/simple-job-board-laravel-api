<?php

use App\Models\User;
use App\Models\Vacancy;

it('possible for vacancy to have publisher', function () {
    $user = User::factory()->create();
    $vacancy = Vacancy::factory()->create([
        'user_id' => $user,
    ]);
    expect($vacancy
        ->load('publisher')
        ->publisher
        ->is($user))
        ->toBeTrue();
});
