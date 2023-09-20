<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brokers = Broker::latest()->paginate(10);
        return BrokersResource::collection($brokers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $broker =  Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo' => $request->logo,
        ]);

        return new BrokersResource($broker);
    }

    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Broker $broker)
    {
        $broker->update($request->only([
            'name', 'address', 'city', 'zip_code', 'phone_number', 'logo',
        ]));

        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();

        return response()->json([
            'success' => true,
            'message' =>  'Broker Deleted Successfully',
        ]);
    }
}
