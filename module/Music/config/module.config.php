<?php
return array(
    'router' => array(
        'routes' => array(
            'music.rest.album' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/albums[/:album_id]',
                    'defaults' => array(
                        'controller' => 'Music\\V1\\Rest\\Album\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'music.rest.album',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            // 'Music\\V1\\Rest\\Album\\AlbumResource' => 'Music\\V1\\Rest\\Album\\AlbumResource',
        ),
    ),
    'zf-rest' => array(
        'Music\\V1\\Rest\\Album\\Controller' => array(
            'listener' => 'Music\\V1\\Rest\\Album\\AlbumResource',
            'route_name' => 'music.rest.album',
            'identifier_name' => 'album_id',
            'collection_name' => 'album',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => 'Music\\V1\\Rest\\Album\\AlbumEntity',
            'collection_class' => 'Music\\V1\\Rest\\Album\\AlbumCollection',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Music\\V1\\Rest\\Album\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'Music\\V1\\Rest\\Album\\Controller' => array(
                0 => 'application/vnd.music.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'Music\\V1\\Rest\\Album\\Controller' => array(
                0 => 'application/vnd.music.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Music\\V1\\Rest\\Album\\AlbumEntity' => array(
                'identifier_name' => 'album_id',
                'route_name' => 'music.rest.album',
                'hydrator' => 'Zend\Stdlib\Hydrator\ObjectProperty',
            ),
            'Music\\V1\\Rest\\Album\\AlbumCollection' => array(
                'identifier_name' => 'album_id',
                'route_name' => 'music.rest.album',
                'is_collection' => '1',
            ),
        ),
    ),
);
