<?php

use Atst\StackBackstage;
use Darsyn\Stack\RequestId\Injector as RequestInjector;
use Darsyn\Stack\RequestId\UuidGenerator;
use Symfony\Component\HttpFoundation\Request;

/**
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../var/bootstrap.php.cache';

// If you need to make changes to the parameters in an emergency, but don't want to change the configuration parameters
// (those values may be specific to the current installation) then add "PARAMETER=VALUE" pairs (one per line) to the
// ".env" file in the parent directory in the External Parameter format:
//     http://symfony.com/doc/current/cookbook/configuration/external_parameters.html
// Remember that if you make any changes to that file (including deletion), you need to clear the cache!
file_exists($envFile = __DIR__ . '/../.env') && Dotenv::load($envFile);

// Enable APC for autoloading to improve performance. You should change the ApcClassLoader first argument to a unique
// prefix in order to prevent cache key conflicts with other applications also using APC.
# $apcLoader = new Symfony\Component\ClassLoader\ApcClassLoader(sha1(__FILE__), $loader);
# $loader->unregister();
# $apcLoader->register(true);

$kernel = new AppKernel('prod', false);
$stack = (new Stack\Builder)
    # ->push('AppCache')
    ->push(StackBackstage::class, __DIR__ . '/maintenance.html')
    ->push(RequestInjector::class, new UuidGenerator(getenv('APPLICATION_NODE_ID') ?: null))
    ->resolve($kernel);
$kernel->loadClassCache();

// When using the HttpCache, you need to call the method in your front controller instead of relying on the
// configuration parameter.
# Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $stack->handle($request);
$response->send();
$kernel->terminate($request, $response);
