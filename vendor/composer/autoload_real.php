<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit28d7656cace2fe3e310d6f3ae077face
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit28d7656cace2fe3e310d6f3ae077face', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit28d7656cace2fe3e310d6f3ae077face', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit28d7656cace2fe3e310d6f3ae077face::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
