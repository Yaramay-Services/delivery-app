<?php

use Illuminate\Support\Facades\Http;

class ShipdayApi
{
    protected $baseURL = '';

    protected $apiKey = '';

    protected $client;

    public function __construct()
    {
        $this->baseURL = 'https://api.shipday.com/';

        $this->apiKey = 'BootbPAwUR.OuyGD3eqQw7c1JGiKA4d';

        $this->client = Http::withHeaders([
            "accept: application/json",
            "content-type: application/json",
            "x-api-key: $this->apiKey"
        ]);
    }

    public function insertOrder($order, $orderItems)
    {
        $reponse = $this->client->post(
            $this->baseURL . 'orders',
            [
                'orderNumber' => '99qT5A',
                'customerName' => 'Mr. Jhon Mason',
                'customerAddress' => '556 Crestlake Dr, San Francisco, CA 94132, USA',
                'customerEmail' => 'jhonMason@gmail.com',
                'customerPhoneNumber' => '+14152392212',
                'restaurantName' => 'Popeyes Louisiana Kitchen',
                'restaurantAddress' => '890 Geneva Ave, San Francisco, CA 94112, United States',
                'restaurantPhoneNumber' => '+14152392013',
                'expectedDeliveryDate' => '2021-06-03',
                'expectedPickupTime' => '17:45:00',
                'expectedDeliveryTime' => '19:22:00',
                'pickupLatitude' => 41.53867,
                'pickupLongitude' => -72.0827,
                'deliveryLatitude' => 41.53867,
                'deliveryLongitude' => -72.0827,
                'orderItem' => [
                    [
                        'name' => 'Popcorn Shrimp',
                        'quantity' => 3,
                        'unitPrice' => 2.99,
                        'addOns' => [
                            'string'
                        ],
                        'detail' => 'Please add less salt'
                    ]
                ],
                'tips' => 2.5,
                'tax' => 1.5,
                'discountAmount' => 1.5,
                'deliveryFee' => 3,
                'totalOrderCost' => 13.47,
                'pickupInstruction' => 'Will be ready in 15 minutes',
                'deliveryInstruction' => 'fast',
                'orderSource' => 'Seamless',
                'additionalId' => '4532',
                'clientRestaurantId' => 12,
                'paymentMethod' => 'credit_card',
                'creditCardType' => 'visa',
                'creditCardId' => 1234,
                'pickup' => [
                    'address' => [
                        'unit' => 'string',
                        'street' => 'string',
                        'city' => 'string',
                        'state' => 'string',
                        'zip' => 'string',
                        'country' => 'string'
                    ]
                ],
                'dropoff' => [
                    'address' => [
                        'unit' => 'string',
                        'street' => 'string',
                        'city' => 'string',
                        'state' => 'string',
                        'zip' => 'string',
                        'country' => 'string'
                    ]
                ]
            ]
        );

        dd($reponse->collect());

        return $reponse->collect();
    }
}
