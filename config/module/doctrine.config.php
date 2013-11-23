<?php
return array(
    'entitymanager' => array(
        'identity' => array(
            'connection'    => 'identity',
            'configuration' => 'identity'
        ),
    ),
    'driver' => array(
        'identity_entities' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(
                __DIR__.'/../../src/IdentityCommon/Entity',
            ),
        ),
        'identity' => array(
            'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
            'drivers' => array(
                'IdentityCommon\Entity' => 'identity_entities'
            ),
        ),
    ),
    'configuration' => array(
        'identity' => array(
            'metadata_cache'     => 'array',
            'query_cache'        => 'array',
            'result_cache'       => 'array',
            'driver'             => 'identity',
            'generate_proxies'   => true,
            'proxy_dir'          => 'data/DoctrineORMModule/Proxy',
            'proxy_namespace'    => 'DoctrineORMModule\Proxy',
            'filters'            => array(),
            'datetime_functions' => array(),
            'string_functions'   => array(),
            'numeric_functions'  => array(),
        ),
    ),
);
