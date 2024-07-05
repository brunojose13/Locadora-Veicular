<?php

describe('sum', function () {
    it('may sum integers', function () {
        $result = sum(1, 2);
  
        expect($result)->toBe(3);
     });
  
     it('may sum floats', function () {
        $result = sum(1.5, 2.5);
  
        expect($result)->toBe(4.0);
     });
 });

it('throws exception', function () {
    throw new Exception('Something happened.');
})->throws(Exception::class);

it('has products', function (string $product) {
    expect($product)->not->toBeEmpty();
})->with('products');
 
dataset('products', [
    'egg',
    'milk'
]);

function sum($a, $b) 
{
    return $a + $b;
}
 