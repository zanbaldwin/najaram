<?php

namespace AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CommonmarkPass implements CompilerPassInterface
{
    const ENVIRONMENT_SERVICE = 'app.commonmark.environment';
    const EXTENSION_TAG = 'commonmark.extension';

    /**
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(static::ENVIRONMENT_SERVICE)) {
            return;
        }
        $definition = $container->findDefinition(static::ENVIRONMENT_SERVICE);
        $taggedServices = $container->findTaggedServiceIds(static::EXTENSION_TAG);
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addExtension', [new Reference($id)]);
        }
    }
}
