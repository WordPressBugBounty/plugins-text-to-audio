<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd518cadaed440bd90dc9e4378262121d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TTA_Public\\' => 11,
            'TTA_Api\\' => 8,
            'TTA_Admin\\' => 10,
            'TTA\\' => 4,
        ),
        'A' => 
        array (
            'AtlasAiDev\\AppService\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TTA_Public\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
        'TTA_Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
        'TTA_Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
        'TTA\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'AtlasAiDev\\AppService\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs/AtlasAiDev',
        ),
    );

    public static $classMap = array (
        'AtlasAiDev\\AppService\\Client' => __DIR__ . '/../..' . '/libs/AtlasAiDev/Client.php',
        'AtlasAiDev\\AppService\\Insights' => __DIR__ . '/../..' . '/libs/AtlasAiDev/Insights.php',
        'AtlasAiDev\\AppService\\Promotions' => __DIR__ . '/../..' . '/libs/AtlasAiDev/Promotions.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'TTA\\TTA' => __DIR__ . '/../..' . '/includes/TTA.php',
        'TTA\\TTA_Activator' => __DIR__ . '/../..' . '/includes/TTA_Activator.php',
        'TTA\\TTA_Cache' => __DIR__ . '/../..' . '/includes/TTA_Cache.php',
        'TTA\\TTA_Deactivator' => __DIR__ . '/../..' . '/includes/TTA_Deactivator.php',
        'TTA\\TTA_Error_Handler' => __DIR__ . '/../..' . '/includes/TTA_Error_Handler.php',
        'TTA\\TTA_Helper' => __DIR__ . '/../..' . '/includes/TTA_Helper.php',
        'TTA\\TTA_Hooks' => __DIR__ . '/../..' . '/includes/TTA_Hooks.php',
        'TTA\\TTA_Lib_AtlasAiDev' => __DIR__ . '/../..' . '/includes/TTA_Lib_AtlasAiDev.php',
        'TTA\\TTA_Loader' => __DIR__ . '/../..' . '/includes/TTA_Loader.php',
        'TTA\\TTA_Notices' => __DIR__ . '/../..' . '/includes/TTA_Notices.php',
        'TTA\\TTA_i18n' => __DIR__ . '/../..' . '/includes/TTA_i18n.php',
        'TTA_Admin\\TTA_Admin' => __DIR__ . '/../..' . '/admin/TTA_Admin.php',
        'TTA_Api\\AtlasVoice_Analytics' => __DIR__ . '/../..' . '/api/AtlasVoice_Analytics.php',
        'TTA_Api\\AtlasVoice_Plugin_Compatibility' => __DIR__ . '/../..' . '/api/AtlasVoice_Plugin_Compatibility.php',
        'TTA_Api\\TTA_Api_Routes' => __DIR__ . '/../..' . '/api/TTA_Api_Routes.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd518cadaed440bd90dc9e4378262121d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd518cadaed440bd90dc9e4378262121d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd518cadaed440bd90dc9e4378262121d::$classMap;

        }, null, ClassLoader::class);
    }
}
