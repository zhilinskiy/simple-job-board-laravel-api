<?php

use App\Models\User;

it('possible for user to like other user', function () {
    $actor = User::factory()->create();
    $target = User::factory()->create();

    $actor->likes()->attach($target->id);

    $this->assertDatabaseHas('like_user', [
        'user_id' => $actor->id,
        'like_id' => $target->id,
    ]);

    expect($actor->likes()->first()->is($target))->toBeTrue();
});
