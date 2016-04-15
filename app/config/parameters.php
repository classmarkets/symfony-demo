<?php

// Look for environment variables with an APP__ prefix and set container
// parameters. The variable APP__API__BASE_URL=https://example.com sets the
// parameter "api.base_url" to "https://example.com"
//
// We use $_SERVER because $_ENV doesn't exist in all sapis.
foreach ($_SERVER as $key => $value) {
    if (0 === strpos($key, 'APP__')) {
        $parameterName = strtolower(str_replace('__', '.', substr($key, 5)));
        $container->setParameter($parameterName, $value);
    }
}
