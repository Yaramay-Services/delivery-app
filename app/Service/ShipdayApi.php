<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class ShipdayApi
{
    protected $baseURL = '';

    protected $apiKey = '';

    protected $client;

    public function __construct()
    {
        $this->baseURL = 'https://api.shipday.com/';

        $this->apiKey = config('shipday.api_key');

        $this->client = Http::withHeaders([
            'Authorization' => "Basic $this->apiKey",
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'x-api-key' => $this->apiKey
        ]);
    }

    public function insertOrder($order, $orderDetails, $business)
    {
        $orderItems = [];
        foreach ($orderDetails as $item) {
            $orderItems[] =                     [
                'name' => $item['menu_name'],
                'quantity' => $item['quantity'],
                'unitPrice' => $item['selling_price'],
                'addOns' => collect($item['order_items'])->pluck('menu_variation_name')->toArray(),
                'detail' => ''
            ];
        }

        $dropOff = [];
        foreach ($orderItems as $item) {
            $dropOff['address'] = [
                'unit' => 'string',
                'street' => 'string',
                'city' => 'string',
                'state' => 'string',
                'zip' => 'string',
                'country' => 'string'
            ];
        }

        $params =  [
            'orderNumber' => $order['id'],
            'customerName' => $order['first_name'] . ' ' . $order['last_name'],
            'customerAddress' => $order['address'],
            'customerEmail' => $order['email'],
            'customerPhoneNumber' => $order['phone_no'],
            'restaurantName' => $business['business_name'],
            'restaurantAddress' => $business['address'],
            'restaurantPhoneNumber' => $business['phone_no'],
            'expectedDeliveryDate' => now()->format('Y-m-d'),
            'expectedPickupTime' => now()->addMinutes(40)->format('H:m:i'),
            'expectedDeliveryTime' => now()->addMinutes(40)->format('H:m:i'),
            'pickupLatitude' => $business['latitude'],
            'pickupLongitude' => $business['longitude'],
            'deliveryLatitude' => $business['latitude'],
            'deliveryLongitude' => $business['longitude'],
            'orderItem' => $orderItems,
            'tips' => 0,
            'tax' => 0,
            'discountAmount' => 0,
            'deliveryFee' => $order['delivery_fee'],
            'totalOrderCost' => $order['total'],
            'pickupInstruction' => 'Will be ready in 15 minutes',
            'deliveryInstruction' => 'fast',
            'orderSource' => 'Seamless',
            'additionalId' => '',
            'clientRestaurantId' => $business['id'],
            'paymentMethod' => 'credit_card',
            'creditCardType' => 'other',
            'creditCardId' => 0,
            // 'pickup' => [
            //     'address' => [
            //         'unit' => 'string',
            //         'street' => 'string',
            //         'city' => 'string',
            //         'state' => 'string',
            //         'zip' => 'string',
            //         'country' => 'string'
            //     ]
            // ],
            'dropoff' => $dropOff
        ];

        $response = $this->client->post($this->baseURL . 'orders', $params);
  
        return $response->collect();
    }
}
