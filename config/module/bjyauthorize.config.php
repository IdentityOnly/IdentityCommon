<?php
return array(
    'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
    'role_providers' => array(
        'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
            'role_entity_class' => 'IdentityCommon\Entity\User\Role',
            'object_manager'    => 'doctrine.entity_manager.identity',
        ),
    ),
    'resource_providers' => array(
        'BjyAuthorize\Provider\Resource\Config' => array(
            
        ),
    ),
    'rule_providers' => array(
        'BjyAuthorize\Provider\Rule\Config' => array(
            'allow' => array(
                
            ),
        ),
    )
);
