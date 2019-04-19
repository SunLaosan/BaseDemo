<?php
/**
 * Created by PhpStorm.
 * User: 孙洪飞
 * Date: 2019/4/18
 * Time: 11:02
 */

/**
 * PHP画图系统的坐标系 圆点位于左上角
 * *----------------------> +X
 * |         |
 * |         |
 * |- - - - -*(3,3)
 * |
 * |
 * v
 * +Y
 */
function createImage($width = 100, $height = 40, $size = 16)
{
    //创建画布
    $ch = imagecreate($width, $height);
    //创建背景色
    imagecolorallocate($ch, 200, 200, 200);
    //另一种方法创建画布并填充颜色
    //$ch = imagecreatetruecolor(100,40);    //创建真彩图像资源
    //$color = imagecolorAllocate($ch,200,200,200);   //分配一个灰色
    //imagefill($ch,0,0,$color) ;                 // 从左上角开始填充灰色

    //产生验证字符 4位
    $data = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    for ($i = 0; $i < 4; $i ++) {
        $angle = mt_rand(-30, 30);
        $x = ($i * $width / 4) + rand(5, 10);
        $y = mt_rand($size, $height);
        $rand = mt_rand(0, 61);
        $text = $data[$rand];
        //采用深颜色 数值小 颜色深  字母左下角坐标为起始坐标
        $color = imagecolorallocate($ch, mt_rand(0, 120),  mt_rand(0, 120),  mt_rand(0, 120));

        imagettftext($ch, $size, $angle, $x, $y, $color, 'font.otf', $text);
        //imagestring($ch, $size, $x, $y, $text, $color);//此函数不能添加中文
    }

    //用来在背景图片上产生200个干扰点
    for ($i = 0; $i < 200; $i ++) {
        $color = imagecolorallocate( $ch, rand(50,200), rand(50, 200), rand(50, 200));
        //该函数用来把每个干扰点在背景上描绘出来
        imagesetpixel( $ch, rand(1, 99), rand(1,29), $color);
    }

    //产生三条干扰线
    for ($i = 0; $i < 3; $i ++) {
        $color=imagecolorallocate($ch, rand(80, 220), rand(80, 220), rand(80, 220));
        //画出每条干扰线
        imageline( $ch, rand(1, 99), rand(1, 29), rand(1, 99), rand(1,29), $color);
    }

    //指定输出类型
    header('content-type:image/png');
    //输出图片
    imagepng($ch);
    //释放资源
    imagedestroy($ch);
}
createImage();
