<?php

use App\Models\Post;
use App\Models\User;

it('allows authenticated users to leave comments', function () {
    $author = User::factory()->create();
    $post = Post::factory()->for($author, 'user')->create();
    $commenter = User::factory()->create();

    $response = $this
        ->actingAs($commenter)
        ->post(route('comments.store', $post), [
            'body' => 'Great perspective on this topic!',
        ]);

    $response->assertRedirect(route('post', $post));

    $this->assertDatabaseHas('comments', [
        'post_id' => $post->id,
        'user_id' => $commenter->id,
        'body'    => 'Great perspective on this topic!',
    ]);
});

it('prevents guests from commenting', function () {
    $post = Post::factory()->for(User::factory(), 'user')->create();

    $response = $this->post(route('comments.store', $post), [
        'body' => 'Guest comment should fail.',
    ]);

    $response->assertRedirect(route('login'));

    $this->assertDatabaseMissing('comments', [
        'body' => 'Guest comment should fail.',
    ]);
});

it('validates the comment body', function () {
    $post = Post::factory()->for(User::factory(), 'user')->create();
    $commenter = User::factory()->create();

    $response = $this
        ->from(route('post', $post))
        ->actingAs($commenter)
        ->post(route('comments.store', $post), [
            'body' => '', // пустой комментарий для проверки валидации
        ]);

    $response
        ->assertSessionHasErrors('body')
        ->assertRedirect(route('post', $post));
});
