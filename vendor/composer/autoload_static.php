<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1073dd0e6537948e5d25b40c869d2a01
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1073dd0e6537948e5d25b40c869d2a01::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1073dd0e6537948e5d25b40c869d2a01::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}