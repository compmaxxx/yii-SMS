<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'js/mimo84-bootstrap-maxlength-37c95be/bower_components/qunit/qunit/qunit.css'
    ];
    public $js = [
        'js/mimo84-bootstrap-maxlength-37c95be/src/bootstrap-maxlength.js',
        'js/mimo84-bootstrap-maxlength-37c95be/bower_components/qunit/qunit/qunit.js',
        'js/mimo84-bootstrap-maxlength-37c95be/sendMsg.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
