<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3901f8a70b7fb357439a86508fc4e906
{
    public static $files = array (
        '04c6c5c2f7095ccf6c481d3e53e1776f' => __DIR__ . '/..' . '/mustangostang/spyc/Spyc.php',
        '11531609ab00f54f0a09224fbf5fa8d6' => __DIR__ . '/..' . '/assertchris/hash-compat/src/hash.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SilverStripe\\Forms\\' => 19,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SilverStripe\\Forms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/segment-field/code',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'GDM\\' => 
            array (
                0 => __DIR__ . '/..' . '/gdmedia/ss-auto-git-ignore',
            ),
        ),
    );

    public static $classMap = array (
        'SilverStripe\\Cms\\Test\\Behaviour\\FeatureContext' => __DIR__ . '/../..' . '/cms/tests/behat/features/bootstrap/FeatureContext.php',
        'SilverStripe\\Cms\\Test\\Behaviour\\FixtureContext' => __DIR__ . '/../..' . '/cms/tests/behat/features/bootstrap/SilverStripe/Cms/Test/Behaviour/FixtureContext.php',
        'SilverStripe\\Cms\\Test\\Behaviour\\ThemeContext' => __DIR__ . '/../..' . '/cms/tests/behat/features/bootstrap/SilverStripe/Cms/Test/Behaviour/ThemeContext.php',
        'SilverStripe\\Framework\\Test\\Behaviour\\CmsFormsContext' => __DIR__ . '/../..' . '/framework/tests/behat/features/bootstrap/SilverStripe/Framework/Test/Behaviour/CmsFormsContext.php',
        'SilverStripe\\Framework\\Test\\Behaviour\\CmsUiContext' => __DIR__ . '/../..' . '/framework/tests/behat/features/bootstrap/SilverStripe/Framework/Test/Behaviour/CmsUiContext.php',
        'SilverStripe\\Framework\\Test\\Behaviour\\FeatureContext' => __DIR__ . '/../..' . '/framework/tests/behat/features/bootstrap/FeatureContext.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3901f8a70b7fb357439a86508fc4e906::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3901f8a70b7fb357439a86508fc4e906::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3901f8a70b7fb357439a86508fc4e906::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3901f8a70b7fb357439a86508fc4e906::$classMap;

        }, null, ClassLoader::class);
    }
}
