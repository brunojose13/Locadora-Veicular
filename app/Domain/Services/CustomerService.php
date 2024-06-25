<?php

namespace App\Domain\Services;

use App\Adapters\CustomerRepository;
use App\Domain\Entities\CustomerEntity;
use App\Models\Customer;

class CustomerService
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function storeCustomer(CustomerEntity $customerEntity)
    {
        try {
            $customer = Customer::create($customerEntity->jsonSerialize());
        } catch (\Throwable) {

        }

        return $customer;
    }
}
