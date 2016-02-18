<?php

namespace AppBundle;

use AppBundle\DependencyInjection\Compiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new Compiler\CommonmarkPass);
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
