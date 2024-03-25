<?php

namespace Tests\Unit;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    public function testScopeWithEmail()
    {
        
        $customerWithTargetEmail = Customer::factory()->create(['email' => 'test@example.com']);
        $customerWithoutTargetEmail = Customer::factory()->create(['email' => 'other@example.com']);

        $filteredCustomers = Customer::withEmail('test@example.com')->get();

        $this->assertTrue($filteredCustomers->contains($customerWithTargetEmail));
        $this->assertFalse($filteredCustomers->contains($customerWithoutTargetEmail));
    }

    public function testScopeWithPhone()
    {
        
        $customerWithTargetPhone = Customer::factory()->create(['phone' => '05000000001']);
        $customerWithoutTargetPhone = Customer::factory()->create(['phone' => '05000000002']);

        $filteredCustomers = Customer::withPhone('05000000001')->get();

        $this->assertTrue($filteredCustomers->contains($customerWithTargetPhone));
        $this->assertFalse($filteredCustomers->contains($customerWithoutTargetPhone));
    }
}
