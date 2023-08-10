<?php

use App\Models\Landlord\Hero;

beforeEach(function () {
    $this->userAuthenticated();
});

it('Hero page render successfully', function () {
    Hero::factory()->create();
    $this->get(route('hero.index'))
    ->assertOk()
    ->assertViewIs('landlord.super-admin.pages.heroes.index');
});

/*
|--------------------------------------------------------------------------
| Validation -
|--------------------------------------------------------------------------
|
*/

test('heading - required | string | min:3 | max: 50', function () {
    // $this->withoutExceptionHandling();
    // Hero::factory()->create();

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['heading' =>'']))
        ->assertInvalid(['heading' => 'required']);

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['heading' => 12]))
        ->assertSessionHasErrors('heading');

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['heading' => 'ab']))
        ->assertSessionHasErrors('heading');

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['heading' => 'fdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfd']))
        ->assertSessionHasErrors('heading');
});

test('button_text - required | string | min:3 | max: 50', function () {
    // $this->withoutExceptionHandling();
    // Hero::factory()->create();

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['button_text' =>'']))
        ->assertInvalid(['button_text' => 'required']);

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['button_text' => 12]))
        ->assertSessionHasErrors('button_text');

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['button_text' => 'ab']))
        ->assertSessionHasErrors('button_text');

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['button_text' => 'fdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfd']))
        ->assertSessionHasErrors('button_text');
});
test('sub_heading - required', function () {
    // $this->withoutExceptionHandling();
    // Hero::factory()->create();

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['sub_heading' =>'']))
        ->assertInvalid(['sub_heading' => 'required']);

    $this->post(route('hero.updateOrCreate'), array_merge(HeroData(), ['sub_heading' => 12]))
        ->assertSessionHasErrors('sub_heading');
});


test('Updated Data Successfully', function () {
    // $this->withoutExceptionHandling();
    Hero::factory()->create();

    $this->post(route('hero.updateOrCreate'), HeroData());
    $this->assertCount(1, Hero::all());
});
