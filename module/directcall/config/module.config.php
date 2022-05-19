<?php
return [
    'service_manager' => [
        'factories' => [
            \directcall\V1\Rest\Provider\ProviderController::class => \directcall\V1\Rest\Provider\ProviderControllerFactory::class,
            \directcall\V1\Rest\Temperature\TemperatureResource::class => \directcall\V1\Rest\Temperature\TemperatureResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'directcall.rest.provider' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/provider[/:provider_id]',
                    'defaults' => [
                        'controller' => 'directcall\\V1\\Rest\\Provider\\Controller',
                    ],
                ],
            ],
            'directcall.rest.temperature' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/temperature[/:temperature_id]',
                    'defaults' => [
                        'controller' => 'directcall\\V1\\Rest\\Temperature\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'directcall.rest.provider',
            1 => 'directcall.rest.temperature',
        ],
    ],
    'api-tools-rest' => [
        'directcall\\V1\\Rest\\Provider\\Controller' => [
            'listener' => \directcall\V1\Rest\Provider\ProviderResource::class,
            'route_name' => 'directcall.rest.provider',
            'route_identifier_name' => 'provider_id',
            'collection_name' => 'provider',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \directcall\V1\Rest\Provider\ProviderEntity::class,
            'collection_class' => \directcall\V1\Rest\Provider\ProviderCollection::class,
            'service_name' => 'provider',
        ],
        'directcall\\V1\\Rest\\Temperature\\Controller' => [
            'listener' => \directcall\V1\Rest\Temperature\TemperatureResource::class,
            'route_name' => 'directcall.rest.temperature',
            'route_identifier_name' => 'temperature_id',
            'collection_name' => 'temperature',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \directcall\V1\Rest\Temperature\TemperatureEntity::class,
            'collection_class' => \directcall\V1\Rest\Temperature\TemperatureCollection::class,
            'service_name' => 'temperature',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'directcall\\V1\\Rest\\Provider\\Controller' => 'HalJson',
            'directcall\\V1\\Rest\\Temperature\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'directcall\\V1\\Rest\\Provider\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'directcall\\V1\\Rest\\Temperature\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'directcall\\V1\\Rest\\Provider\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/json',
            ],
            'directcall\\V1\\Rest\\Temperature\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \directcall\V1\Rest\Provider\ProviderEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.provider',
                'route_identifier_name' => 'provider_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \directcall\V1\Rest\Provider\ProviderCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.provider',
                'route_identifier_name' => 'provider_id',
                'is_collection' => true,
            ],
            \directcall\V1\Rest\Temperature\TemperatureEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.temperature',
                'route_identifier_name' => 'temperature_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \directcall\V1\Rest\Temperature\TemperatureCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.temperature',
                'route_identifier_name' => 'temperature_id',
                'is_collection' => true,
            ],
        ],
    ],
];
