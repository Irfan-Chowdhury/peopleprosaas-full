<?php

use App\Models\Landlord\Feature;


// Testing Page Response Status
it('gives back a successful response for home page', function () {
    $this->get(route('feature.index'))->assertOk();
});

it('returns correct view', function() {
    // Act & Assert
    $this->get(route('feature.index'))
        ->assertOk()
        ->assertViewIs('landlord.super-admin.pages.features.index');
});


/*
|--------------------------------------------------------------------------
| During Store
|--------------------------------------------------------------------------
|
*/

// Validation

it('requires the name', function () {
    // $this->withoutExceptionHandling();
    $this->post(route('feature.store'), array_merge(featureData(), ['name' =>'']))
        ->assertInvalid(['name' => 'required']);
});
test('name should be unique', function () {
    Feature::create(featureData());
    $this->post(route('feature.store'), array_merge(featureData(), [
        'name' =>'fa fa-address-book-o',
        'icon' =>'Another Icon'
        ]))->assertSessionHasErrors('name');

    // $this->assertDatabaseMissing('features', featureData()); // Assert that the record doesn't exist in the database
});

it('requires the icon', function () {
    $this->post(route('feature.store'), array_merge(featureData(), ['icon' =>'']))
        ->assertInvalid(['icon' => 'required']);
});
test('icon should be unique', function () {
    Feature::create(featureData());
    $this->post(route('feature.store'), array_merge(featureData(), [
        'name' =>'Another Name',
        'icon' =>'book'
        ]))->assertSessionHasErrors('icon');
});

//store
test('Feature Store', function () {
    $this->withoutExceptionHandling();
    $this->post(route('feature.store'), featureData());
    $this->assertCount(1, Feature::all());
});

/*
|--------------------------------------------------------------------------
| Show Data By Id
|--------------------------------------------------------------------------
|
*/

test('Feature return object', function () {
    $feature = Feature::create(featureData());
    $result = $this->get(route('feature.edit', $feature->id));
    expect($result)->toBeObject();
});


/*
|--------------------------------------------------------------------------
| During Update
|--------------------------------------------------------------------------
|
*/

test('Update- The name field is required', function () {
    $feature = Feature::create(featureData());
    $this->post(route('feature.update', $feature->id), array_merge(featureData(), [
            'name' =>'',
            'icon' =>'test-icon'
        ]))
        ->assertInvalid(['name' => 'required']);
});
test('Update- The name has already been taken.', function () {
    $feature = Feature::create(featureData());
    $this->post(route('feature.update', $feature->id), array_merge(featureData(), [
            'name' =>'fa fa-address-book-o',
            'icon' =>'another-icon'
        ]))
        ->assertSessionHasErrors('name');
});

test('Update- The icon field is required', function () {
    $feature = Feature::create(featureData());
    $this->post(route('feature.update', $feature->id), array_merge(featureData(), [
            'name' =>'another-name',
            'icon' =>''
        ]))
        ->assertInvalid(['icon' => 'required']);
});
test('Update- The icon has already been taken.', function () {
    $feature = Feature::create(featureData());
    $this->post(route('feature.update', $feature->id), array_merge(featureData(), [
            'name' =>'another-name',
            'icon' =>'book'
        ]))
        ->assertSessionHasErrors('icon');
});

test('Updated- Successfully', function () {
    $feature = Feature::create(featureData());
    $result = $this->post(route('feature.update', $feature->id), array_merge(featureData(), [
            'name' =>'another-name',
            'icon' =>'another-icon'
    ]));
    expect($result)->toBeTruthy();

    // This is just test purpose
    $feature = Feature::find($feature->id);
    expect(['name' => $feature->name])->toHaveKey('name', 'another-name');
    expect(['icon' => $feature->icon])->toHaveKey('icon', 'another-icon');
});

/*
|--------------------------------------------------------------------------
| During Delete
|--------------------------------------------------------------------------
|
*/

test('Deleted- Successfully', function () {
    // $this->withoutExceptionHandling();
    $feature = Feature::create(featureData());
    $result = $this->get(route('feature.destroy', $feature->id));
    expect($result)->toBeTruthy();
});
