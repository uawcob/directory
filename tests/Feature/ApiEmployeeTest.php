<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Employee;

class ApiEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_gets_employee()
    {
        $employee = create(Employee::class);

        $this
            ->getJson("/api/v1/employees/{$employee->username}")
            ->assertJson(['data' => [
                'email' => strtolower($employee->email),
                'name' => $employee->prefname,
                'departments' => [
                    $employee->BU_Code,
                ],
            ]])
        ;
    }
}
