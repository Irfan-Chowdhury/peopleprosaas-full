<?php

use App\Models\Landlord\GeneralSetting;

beforeEach(function () {
    $this->userAuthenticated();
});


it('General Setting page render successfully', function () {
    GeneralSetting::factory()->create();
    $this->get(route('setting.general.index'))
    ->assertOk()
    ->assertViewIs('landlord.super-admin.pages.settings.index');
});



/*
|--------------------------------------------------------------------------
| Validation - Site Title
|--------------------------------------------------------------------------
|
*/

it('site_title - required | string | min:3 | max: 50', function () {
    // $this->withoutExceptionHandling();
    GeneralSetting::factory()->create();

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['site_title' =>'']))
        ->assertInvalid(['site_title' => 'required']);

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['site_title' => 12]))
        ->assertSessionHasErrors('site_title');

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['site_title' => 'ab']))
        ->assertSessionHasErrors('site_title');

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['site_title' => 'fdsffdffdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsffdfytrythghfgdhfghgfhfghfgnhgnnnbv fgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdfgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgfdgdgfd']))
        ->assertSessionHasErrors('site_title');
});

it('email - required|email', function () {
    // $this->withoutExceptionHandling();
    GeneralSetting::factory()->create();

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['email' =>'']))
        ->assertInvalid(['email' => 'required']);

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['email' => 'abc.com']))
        ->assertSessionHasErrors('email');
});

it('phone - required|numeric', function () {
    // $this->withoutExceptionHandling();

    GeneralSetting::factory()->create();

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['phone' =>'']))
        ->assertInvalid(['phone' => 'required']);

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['phone' => 'abc.com']))
        ->assertSessionHasErrors('phone');
});

it('footer_link - required|url ', function () {
    // $this->withoutExceptionHandling();

    GeneralSetting::factory()->create();

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['footer_link' =>'']))
        ->assertInvalid(['footer_link' => 'required']);

    $this->post(route('setting.general.manage'), array_merge(generalSettingData(), ['footer_link' => 'abc.com']))
        ->assertSessionHasErrors('footer_link');
});


it('Updated Data Successfully', function () {
    $this->withoutExceptionHandling();
    GeneralSetting::factory()->create();

    $this->post(route('setting.general.manage'), generalSettingData());
    $this->assertCount(1, GeneralSetting::all());
});
