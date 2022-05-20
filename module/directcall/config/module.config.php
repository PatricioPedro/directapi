<?php
return [
    'service_manager' => [
        'factories' => [
            'directcall\\V1\\Rest\\Provider\\ProviderController' => 'directcall\\V1\\Rest\\Provider\\ProviderControllerFactory',
            \directcall\V1\Rest\Temperature\TemperatureResource::class => \directcall\V1\Rest\Temperature\TemperatureResourceFactory::class,
            \directcall\V1\Rest\Provider\ProviderResource::class => \directcall\V1\Rest\Provider\ProviderResourceFactory::class,
            \directcall\V1\Rest\User\UserResource::class => \directcall\V1\Rest\User\UserResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'directcall.rest.temperature' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/temperature[/:temperature_id]',
                    'defaults' => [
                        'controller' => 'directcall\\V1\\Rest\\Temperature\\Controller',
                    ],
                ],
            ],
            'directcall.rest.provider' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/provider[/:provider_id]',
                    'defaults' => [
                        'controller' => 'directcall\\V1\\Rest\\Provider\\Controller',
                    ],
                ],
            ],
            'directcall.rest.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'directcall\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            1 => 'directcall.rest.temperature',
            0 => 'directcall.rest.provider',
            2 => 'directcall.rest.user',
        ],
    ],
    'api-tools-rest' => [
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
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ],
            'collection_query_whitelist' => [
                0 => 'city_uf',
                1 => 'date',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \directcall\V1\Rest\Temperature\TemperatureEntity::class,
            'collection_class' => \directcall\V1\Rest\Temperature\TemperatureCollection::class,
            'service_name' => 'temperature',
        ],
        'directcall\\V1\\Rest\\Provider\\Controller' => [
            'listener' => \directcall\V1\Rest\Provider\ProviderResource::class,
            'route_name' => 'directcall.rest.provider',
            'route_identifier_name' => 'provider_id',
            'collection_name' => 'provider',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \directcall\V1\Rest\Provider\ProviderEntity::class,
            'collection_class' => \directcall\V1\Rest\Provider\ProviderCollection::class,
            'service_name' => 'provider',
        ],
        'directcall\\V1\\Rest\\User\\Controller' => [
            'listener' => \directcall\V1\Rest\User\UserResource::class,
            'route_name' => 'directcall.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
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
            'entity_class' => \directcall\V1\Rest\User\UserEntity::class,
            'collection_class' => \directcall\V1\Rest\User\UserCollection::class,
            'service_name' => 'user',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'directcall\\V1\\Rest\\Temperature\\Controller' => 'Json',
            'directcall\\V1\\Rest\\Provider\\Controller' => 'Json',
            'directcall\\V1\\Rest\\User\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'directcall\\V1\\Rest\\Temperature\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'directcall\\V1\\Rest\\Provider\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'directcall\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'directcall\\V1\\Rest\\Temperature\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/json',
            ],
            'directcall\\V1\\Rest\\Provider\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/json',
            ],
            'directcall\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.directcall.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
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
            \directcall\V1\Rest\User\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \directcall\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'directcall.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'directcall\\V1\\Rest\\Provider\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
