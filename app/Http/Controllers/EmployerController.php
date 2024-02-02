<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerFormRequest;
use App\Http\Resources\EmployerResource;
use App\Models\Employer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return EmployerResource::collection(Employer::orderByDesc('id')->with('service')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployerFormRequest $request): EmployerResource
    {
        return new EmployerResource(Employer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer): EmployerResource
    {
        return new EmployerResource($employer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerFormRequest $request, Employer $employer): EmployerResource
    {
        $employer->update($request->all());

        return new EmployerResource($employer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer): JsonResponse
    {
        $employer->delete();

        return response()->json('Employé supprimé avec succès');
    }
}
