<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita458f0725129d63cb1df7c436e586714
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita458f0725129d63cb1df7c436e586714::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita458f0725129d63cb1df7c436e586714::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita458f0725129d63cb1df7c436e586714::$classMap;

        }, null, ClassLoader::class);
    }
}
