<?php

use App\Infrastructure\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Status;

uses(RefreshDatabase::class);

describe('authentication', function () {
    $credentials = [
        'email' => 'test@test.com',
        'password' => '123456'
    ];

    it('can make a login', function () use ($credentials) {
        $user = User::factory()->create($credentials);

        $response = app()->handle(Request::create(
            route('login', $credentials),
            'POST'
        ));
        
        expect($response)->toBeInstanceOf(JsonResponse::class);
        expect($response->getStatusCode())
            ->toBeInt()
            ->toBe(Status::HTTP_ACCEPTED);
    });

    it('may remain active', function () use ($credentials) {
        $user = User::factory()->create($credentials);
        $token = $user->createToken('test-token')->plainTextToken;

        $request = Request::create(route('authenticated.user'), 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);

        $response = app()->handle($request);
        
        expect($response)->toBeInstanceOf(JsonResponse::class);
        expect($response->getStatusCode())
            ->toBeInt()
            ->toBe(Status::HTTP_OK);
        
        $userFromResponse = json_decode($response->getContent())->user;

        expect($userFromResponse)->toHaveProperties(
            array_keys($user->toArray())
        );
    });
});
