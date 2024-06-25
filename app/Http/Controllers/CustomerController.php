<?php

namespace App\Http\Controllers;

use App\Domain\Entities\CustomerEntity;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Domain\Services\CustomerService;
use Carbon\Carbon;
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

        $customer = $this->customerService->storeCustomer(new CustomerEntity(
            $data['first_name'],
            $data['last_name'],
            $data['cpf'],
            $data['email'],
            $data['phone_number'],
            new Carbon($data['date_of_birth']),
            $data['license_time']
        ));

        return response()->json([
            'clientes' => $customer->jsonSerialize()
        ]);
    }
}
