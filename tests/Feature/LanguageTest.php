<?php

use App\Models\Landlord\Language;


test('language page render successfully', function () {
    $response = $this->get('/super-admin/languages/');

    $response->assertStatus(200);
});



/*
|--------------------------------------------------------------------------
| During Store
|--------------------------------------------------------------------------
|
*/

test('Store - Name is required', function () {
    // $this->withoutExceptionHandling();
    $response =  $this->post('/super-admin/languages/store', array_merge(languageData(), ['name' =>'']));
    $response->assertSessionHasErrors('name');
});
test('Store - Name is unique', function () {
    // $this->withoutExceptionHandling();
    Language::create(languageData());
    $response =  $this->post('/super-admin/languages/store', array_merge(languageData(), ['name' =>'English']));
    $response->assertSessionHasErrors('name');
});




test('Store - Locale is required', function () {
    // $this->withoutExceptionHandling();
    $response =  $this->post(route('language.store'), array_merge(languageData(), ['locale' =>'']));
    $response->assertSessionHasErrors('locale');
});
test('Store - Locale is unique', function () {
    // $this->withoutExceptionHandling();
    Language::create(languageData());

    $response =  $this->post(route('language.store'), array_merge(languageData(), ['locale' =>'en']));
    $response->assertSessionHasErrors('locale');
});
test('Store - locale must be in lowercase', function () {
    // $this->withoutExceptionHandling();
    $response =  $this->post(route('language.store'), array_merge(languageData(), ['locale' =>'BN']));
    $response->assertSessionHasErrors('locale');
});



// it('stops if A file name with the locale already exists', function () {
//     $this->post(route('language.store'), array_merge(languageData(), ['locale' =>'stuooo']));
//     throw new Exception('Something happened');
// })->throws(Exception::class);


test('Language Store', function () {
    $this->post('/super-admin/languages/store', languageData());
    $this->assertCount(1, Language::all());
});
