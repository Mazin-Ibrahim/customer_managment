<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
   use RefreshDatabase;


   public function test_customer_can_be_created(){
     $response = $this->post('/customers/store', [
        'name' => 'Jone Doe',
        'email' => 'jone@app.com',
        'phone' => '05434343321'
    ]);

       $response->assertStatus(302); 
       $this->assertCount(1, Customer::all());
   }

   public function test_customers_are_listed_correctly()
    {
    $customers = Customer::factory()->count(5)->create();

    $response = $this->get('/customers');

    $response->assertStatus(200);

    foreach ($customers as $customer) {
        $response->assertSee($customer->name)
                 ->assertSee($customer->email)->assertSee($customer->email);
    }
    }

    public function test_customer_can_be_updated()
       {
            $customer = Customer::factory()->create();

            $this->put('/customers/'.$customer->id.'/update', [
                'name' => 'updated name',
                'email' => 'updated@email.com',
                'phone' => '0511111111'
            ])->assertStatus(302);

            $customer->refresh();
            $this->assertEquals('updated name', $customer->name);
            $this->assertEquals('updated@email.com', $customer->email);
            $this->assertEquals('0511111111', $customer->phone);
  }

  public function test_customer_can_be_deleted()
{
    $customer = Customer::factory()->create();

    $this->delete('/customers/'.$customer->id.'/delete')
         ->assertStatus(302);

    $this->assertCount(0, Customer::all());
}
}
