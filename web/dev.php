<?php

use Darsyn\Stack\IpRestrict\Whitelist;
use Darsyn\Stack\RequestId\Injector as RequestInjector;
use Darsyn\Stack\RequestId\UuidGenerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line.
// Read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information.
# umask(0000);

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require_once __DIR__ . '/../app/autoload.php';
// In the main front-controller, we load up environmental variables from ".env" - since that is just to change the
// configuration on-the-fly without having to change any source files in production we won't bother including it in
// this front-controller.
Debug::enable();

$kernel = new AppKernel('prod', false);
$stack = (new Stack\Builder)
    // This middleware prevents access to debug front controllers that are deployed by accident to production servers.
    ->push(Whitelist::class, ['127.0.0.1', 'fe80::1', '::1', '192.168.0.0/16'])
    ->push(RequestInjector::class, new UuidGenerator(getenv('APPLICATION_NODE_ID') ?: null))
    ->resolve($kernel);
$kernel->loadClassCache();

$request = Request::createFromGlobals();
$response = $stack->handle($request);
$response->send();
$kernel->terminate($request, $response);
