<?php

namespace App\Http\Controllers\API;

use App\Events\NewProductCreated\NewProductCreatedEvent;
use App\Events\NewProductCreated\NewProductNotificationPayload;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyNewProductToCustomers;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            [
                'id' => Str::uuid(),
                'name' => 'Panqueca de frango com creme cheese.',
                'price' => '15,00 R$',
                'img' => 'https://path/to/image.jpg',
                'stock' => 20,
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $dataToSave = $request->only(
            'name',
            'price',
            'img',
            'stock'
        );

        $uuid = Str::uuid();
        $uuid->toString();
        $dataToSave['id'] = $uuid;
        $savedProduct = Product::create($dataToSave);
        $savedProduct->id = $uuid;

        $eventPayload = new NewProductNotificationPayload($savedProduct->toArray());
        NewProductCreatedEvent::dispatch($eventPayload);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $savedProduct
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
