<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;

class EmployeeController extends Controller
{
    /**
     * @SWG\Swagger(
     *   schemes={"https"},
     *   basePath="/api/v1",
     *   @SWG\Info(
     *     title="Directory API",
     *     version="1.0.0"
     *   )
     * )
     * @SWG\Tag(
     *   name="employees",
     *   description="Access to employee data"
     * )
     */

    /**
     * Display a listing of the resource.
     *
     * @SWG\Get(
     *   tags={"employees"},
     *   path="/employees",
     *   summary="List current employees",
     *   description="Returns a list of current employees",
     *   operationId="getEmployees",
     *   produces={"application/json"},
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref="#/definitions/Employee")
     *     ),
     *   ),
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @SWG\Get(
     *   tags={"employees"},
     *   path="/employees/{username}",
     *   summary="Find employee by username",
     *   description="Returns a single employee",
     *   operationId="getEmployee",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="username",
     *     in="path",
     *     description="The employee username that needs to be fetched.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(ref="#/definitions/Employee"),
     *   ),
     *   @SWG\Response(response=404, description="employee not found"),
     * )
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
