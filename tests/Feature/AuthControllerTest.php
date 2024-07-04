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
        User::factory()->create($credentials);

        $response = app()->handle(Request::create(
            route('login', $credentials),
            'POST'
        ));
        
        expect($response)->toBeInstanceOf(JsonResponse::class);
        expect($response->getStatusCode())
            ->toBeInt()
            ->toBe(Status::HTTP_ACCEPTED);
    });

    it('will remain active', function () use ($credentials) {
        $user = User::factory()->create($credentials);
        $token = $user->createToken('test-token')->plainTextToken;

        $request = Request::create(
            route('authenticated.user')
        );

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

    it('will block unauthorized users', function () {
        $request = Request::create(
            route('authenticated.user')
        );

        // Esse handle() retornará uma string contendo um html de redicionamento para a rota `unauthorized`
        $html = app()->handle($request)->getContent();
        
        preg_match('/url=\'(.*?)\'/', $html, $matches);
        $url = $matches[1];
    
        // O handle() será utilizado novamente para uma nova requisição na rota `unauthorized` 
        $response = app()->handle(Request::create($url));
        
        expect($response)->toBeInstanceOf(JsonResponse::class);
        expect($response->getStatusCode())
            ->toBeInt()
            ->toBe(Status::HTTP_UNAUTHORIZED);
    });
});
