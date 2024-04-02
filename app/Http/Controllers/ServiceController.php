<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ServiceResource::collection(Service::orderByDesc('id')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFormRequest $request): ServiceResource
    {
        return new ServiceResource(Service::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): ServiceResource
    {
        return new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceFormRequest $request, Service $service): ServiceResource
    {
        $service->update($request->validated());

        return new ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): JsonResponse
    {
        $service->delete();

        return response()->json('Service supprimé avec succès');
    }
}
