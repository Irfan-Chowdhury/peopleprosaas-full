<?php


it('landing page render successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});




