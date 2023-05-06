<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d3ada200e3ca09fbf0409ce90b5584b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d3ada200e3ca09fbf0409ce90b5584b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d3ada200e3ca09fbf0409ce90b5584b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5d3ada200e3ca09fbf0409ce90b5584b::$classMap;

        }, null, ClassLoader::class);
    }
}
