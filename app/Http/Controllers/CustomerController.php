<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Customer;

class CustomerController extends Controller
{
    public function __construct(
        protected Customer $service
    )
    { }
}
