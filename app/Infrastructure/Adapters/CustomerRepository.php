<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Entities\CustomerEntity;
use App\Models\Customer;
use Dflydev\DotAccessData\Exception\DataException;

class CustomerRepository
{
    public function storeCustomer(CustomerEntity $customerEntity)
    {
        $model = new Customer();

        if (array_keys($customerEntity->jsonSerialize()) !== $model->getFillable()) {
            throw new DataException(
                'Não foi possível salvar os dados do cliente. As propriedades do mesmo são inválidas'
            );
        }
        
        $customer = $model->create($customerEntity->jsonSerialize());

        return new CustomerEntity(
            $customer['id'],            
            $customer['first_name'],
            $customer['last_name'],
            $customer['cpf'],
            $customer['email'],
            $customer['phone_number'],
            $customer['date_of_birth'],
            $customer['license_time']
        );
    }
}
