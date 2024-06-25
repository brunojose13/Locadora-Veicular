<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Domain\Services\CustomerService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $customerService)
    {
    }

    public function store(StoreCustomerRequest $request): Response|ResponseFactory
    {        
        $data = $request->validated();

        $customer = Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'date_of_birth' => $data['date_of_birth'],
            'license_time' => $data['license_time']
        ]);

        return response()->json([
            'clientes' => $customer->jsonSerialize()
        ]);
    }
}
