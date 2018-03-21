<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25616853438fd1fd9a32d0dde43543b4
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
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25616853438fd1fd9a32d0dde43543b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25616853438fd1fd9a32d0dde43543b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25616853438fd1fd9a32d0dde43543b4::$classMap;

        }, null, ClassLoader::class);
    }
}
