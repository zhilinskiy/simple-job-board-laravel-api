<?php

use App\Models\User;
use App\Models\Vacancy;

it('possible for user to like other user', function () {
    $actor = User::factory()->create();
    $target = User::factory()->create();

    $actor->likes()->attach($target->id);

    $this->assertDatabaseHas('like_user', [
        'user_id' => $actor->id,
        'like_id' => $target->id,
    ]);

    expect($actor
        ->likes()
        ->first()
        ->is($target))
        ->toBeTrue();
});

it('possible for user to publish vacancy', function () {
    $user = User::factory()->create();
    $vacancy = Vacancy::factory()->create([
        'user_id' => $user,
    ]);
    expect($user
        ->publishedVacancies()
        ->first()
        ->is($vacancy))
        ->toBeTrue();
});

it('possible for user to response to published vacancy', function () {
    $user = User::factory()->create();
    $vacancy = Vacancy::factory()->create();
    $user->respondedVacancies()->attach($vacancy->id);
    expect($user
        ->respondedVacancies()
        ->first()
        ->is($vacancy))
        ->toBeTrue();
});

it('possible for user to like published vacancy', function () {
    $user = User::factory()->create();
    $vacancy = Vacancy::factory()->create();
    $user->likedVacancies()->attach($vacancy->id);
    expect($user
        ->likedVacancies()
        ->first()
        ->is($vacancy))
        ->toBeTrue();
});
