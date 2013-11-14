<?php
namespace Music;

use ZF\Apigility\ApigilityModuleInterface;

class Module implements ApigilityModuleInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Music\V1\Rest\Album\AlbumMapper' =>  function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return new \Music\V1\Rest\Album\AlbumMapper($adapter);
                },
                'Music\V1\Rest\Album\AlbumResource' => function ($sm) {
                    $mapper = $sm->get('Music\V1\Rest\Album\AlbumMapper');
                    return new \Music\V1\Rest\Album\AlbumResource($mapper);
                },
            ),
        );
    }
}
