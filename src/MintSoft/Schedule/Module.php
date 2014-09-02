<?php
namespace Schedule;

use Zend\ModuleManager\Feature\FormElementProviderInterface;

class Module implements FormElementProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getFormElementConfig()
    {
        return include __DIR__ . '/config/form_element.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
