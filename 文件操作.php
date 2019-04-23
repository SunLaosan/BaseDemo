<?php
//判断路径存在 参数为文件名会返回false
$a = is_dir('.git');
//判断类型 参数为文件名或路径  dir路径 file文件
$b = filetype('.git');
filetype('.git');
//创建目录 不能创建文件
//$c = mkdir('./test.php');
//扫描指定路径下的全部成员
$d = scandir('../BaseDemo');
//获取文件自然信息 返回一个索引一个关联数组(实际是一个数组)  clearstatcache();清楚stat运行时的缓存
$e = stat('font.otf');

//打开文件 以特定方式 r读 不能没有文件 w覆盖性写入 没有文件会自动创建 a 追加写入 没有文件会自动创建
//返回一个资源
$f = fopen('./demo.txt', 'a');
//写入 打开的资源必须为w或a
$g = fwrite($f, 'abc');
//读取 每次读取一行 打开的资源必须是r
$h = fgets($f);
//关闭
$i = fclose($f);
//file_put_contents 多个规则可用|连接
//FILE_USE_INCLUDE_PATH 使用引用文件路径 设置set_include_path()时 并且使用了FILE_USE_INCLUDE_PATH  则写入文件路径变为引用路径下的文件名
//LOCK_EX 锁定文件 防止多人同时写入
//FILE_APPEND 从结尾写入 防止之前数据丢失
$j = file_put_contents('./demo.txt','\n第二行', FILE_APPEND | LOCK_EX);
//var_dump('<pre/>', $j);