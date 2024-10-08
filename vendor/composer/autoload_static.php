<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf27d256f60ecc101125ba81b95acdedc
{
    public static $files = array (
        '9104211f8f0f03cba7e9f42f07def0c6' => __DIR__ . '/../..' . '/app/Utilities/inc.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AanirEssential\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AanirEssential\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'AanirEssential\\Api\\Callbacks\\Custom_Post' => __DIR__ . '/../..' . '/app/Api/Callbacks/Custom_Post.php',
        'AanirEssential\\Api\\Callbacks\\Custom_Taxonomy' => __DIR__ . '/../..' . '/app/Api/Callbacks/Custom_Taxonomy.php',
        'AanirEssential\\Api\\ElementorPlugin' => __DIR__ . '/../..' . '/app/Api/ElementorPlugin.php',
        'AanirEssential\\Api\\ElementorQuomodoEssentialExtension' => __DIR__ . '/../..' . '/app/Api/ElementorQuomodoEssentialExtension.php',
        'AanirEssential\\Base\\Activate' => __DIR__ . '/../..' . '/app/Base/Activate.php',
        'AanirEssential\\Base\\BaseController' => __DIR__ . '/../..' . '/app/Base/BaseController.php',
        'AanirEssential\\Base\\BaseWPWidget' => __DIR__ . '/../..' . '/app/Base/BaseWPWidget.php',
        'AanirEssential\\Base\\Custom_Post_Type\\Team' => __DIR__ . '/../..' . '/app/Base/Custom_Post_Type/Team.php',
        'AanirEssential\\Base\\Deactivate' => __DIR__ . '/../..' . '/app/Base/Deactivate.php',
        'AanirEssential\\Base\\Enqueue' => __DIR__ . '/../..' . '/app/Base/Enqueue.php',
        'AanirEssential\\Base\\Preloader' => __DIR__ . '/../..' . '/app/Base/Preloader.php',
        'AanirEssential\\Base\\WPWidgets\\Category' => __DIR__ . '/../..' . '/app/Base/WPWidgets/Category.php',
        'AanirEssential\\Base\\WPWidgets\\Gallery' => __DIR__ . '/../..' . '/app/Base/WPWidgets/Gallery.php',
        'AanirEssential\\Init' => __DIR__ . '/../..' . '/app/Init.php',
        'AanirEssential\\Widgets\\App_Store_Button' => __DIR__ . '/../..' . '/app/Widgets/App_Store_Button.php',
        'AanirEssential\\Widgets\\Image_Slider' => __DIR__ . '/../..' . '/app/Widgets/Image_Slider.php',
        'AanirEssential\\Widgets\\Testimonial' => __DIR__ . '/../..' . '/app/Widgets/Testimonial.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf27d256f60ecc101125ba81b95acdedc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf27d256f60ecc101125ba81b95acdedc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf27d256f60ecc101125ba81b95acdedc::$classMap;

        }, null, ClassLoader::class);
    }
}
