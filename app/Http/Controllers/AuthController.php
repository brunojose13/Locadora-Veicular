<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Services\AuthService;
use App\Domain\ValueObjects\Credentials;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\ArrayResponse;
use App\Http\Responses\MessageResponse;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response as Status;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function login(LoginRequest $request): Response
    {
        $credentials = $request->validated();

        try{
            $output = $this->authService->authenticate(new Credentials(
                $credentials['email'], 
                (string) $credentials['password']
            ));

            $response = new ArrayResponse($output, Status::HTTP_ACCEPTED);

            return $response->getResponse();
        } catch (AuthenticationException $exception) {
            $response = new MessageResponse($exception->getMessage(), Status::HTTP_UNAUTHORIZED);
            
            return $response->getResponse();
        }
    }

    public function logout(): Response
    {
        $output = $this->authService->invalidate();
        $response = new MessageResponse($output, Status::HTTP_OK);
        
        return $response->getResponse();
    }

    public function recoverAuthenticated(): Response
    {
        $output = $this->authService->getAttributesFromLoggedAuth();
        $response = new ArrayResponse($output, Status::HTTP_OK);
        
        return $response->getResponse();
    }

    public function unauthorize(): Response
    {
        $response = new MessageResponse(
            $this->authService->getDeauthorizeMessage(),
            Status::HTTP_UNAUTHORIZED
        );
            
        return $response->getResponse();
    }
}
