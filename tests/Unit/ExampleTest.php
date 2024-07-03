<?php

describe('multiplication', function () {
    it('will multiply 2 * 3', function () {
        $result = 2 * 3;
  
        expect($result)->toBe(6);
     });
  
     it('will multiply 5 * 10', function () {
        $result = 5 * 10;
  
        expect($result)->toBe(50);
     });
 });
