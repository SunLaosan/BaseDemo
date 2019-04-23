<?php
$arr = [
    ['id'    =>  1, 'pid'   =>  0, 'name'  =>  '黑龙江'],
    ['id'    =>  2, 'pid'   =>  0, 'name'  =>  '浙江'],
    ['id'    =>  3, 'pid'   =>  1, 'name'  =>  '哈尔滨'],
    ['id'    =>  4, 'pid'   =>  2, 'name'  =>  '杭州'],
    ['id'    =>  5, 'pid'   =>  2, 'name'  =>  '衢州'],
    ['id'    =>  6, 'pid'   =>  2, 'name'  =>  '金华'],
    ['id'    =>  7, 'pid'   =>  1, 'name'  =>  '齐齐哈尔'],
];

/**
 * 递归法
 * @param $arr
 * @param int $pid 最高级pid
 * @return array
 */
function treeOne($arr, $pid = 0)
{
    $tree = [];
    foreach ($arr as $k => $v) {
        if ($v['pid'] == $pid) {
            $v['son'] = treeOne($arr, $v['id']);
            if (!isset($v['son'])) {
                unset($v['son']);
            }
            $tree[] = $v;
        }

    }

    return $tree;
}

/**
 * 取地址引用法
 * @param $arr
 * @param string $id
 * @param string $pid 最高级别的pid
 * @param int $pidnum
 * @return array|mixed
 */
function treeTwo($arr, $id = 'id', $pid = 'pid', $pidnum = 0) {
    $tree = [];
    foreach ($arr as $k => $v) {
        $tree[$v[$id]] = $v;
    }

    foreach ($tree as $k => $v) {
        $tree[$v[$pid]]['son'][$v[$id]] = &$tree[$v[$id]];
    }

    return isset($tree[$pidnum]['son']) ? $tree[$pidnum]['son'] : array();
}
//global/static法
