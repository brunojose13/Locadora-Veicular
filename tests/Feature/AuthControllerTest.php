<?php

describe('authentication', function () {
    it('can make a login', function () {
        $response = route('login', [
            'email' => 'user_test@test.com',
            'password' => '123456'
        ]);

        dd($response);
    });
});