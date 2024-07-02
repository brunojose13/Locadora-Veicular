<?php

namespace App\Domain\Services;

use App\Infrastructure\Adapters\CustomerRepository;
use App\Domain\Entities\CustomerEntity as Customer;
// use App\Models\Customer;

class CustomerService
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function storeCustomer(Customer $customer)
    {
        if ($customer->hasId()) {
            $customer->setId(null);
        }

        try {
            return $this->customerRepository->storeCustomer($customer);
        } catch (\Throwable $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
