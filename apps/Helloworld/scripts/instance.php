<?php
/**
 * Return Helloworld application instance
 */

use BEAR\Sunday\Module\Di\InjectorModule;
use Helloworld\Module\AppModule;
use Ray\Di\Injector;

ini_set('xdebug.max_nesting_level', 200);

require_once __DIR__ . '/autoload.php';

$hasApc = function_exists('apc_fetch');
if ($hasApc && apc_exists('app-helloworld')) {
    return apc_fetch('app-helloworld');
}
$app = Injector::create([new AppModule])->getInstance('BEAR\Sunday\Extension\Application\AppInterface');
$hasApc ? apc_store('app-helloworld', $app) : null;

return $app;
