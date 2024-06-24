<?php

namespace App\Services;

use App\Adapters\CustomerRepository;
use App\Models\Customer;

class CustomerService
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function listCustomers(): Customer
    {
        $customerRepository->
    }
}
