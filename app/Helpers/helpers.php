<?php
/**
 * @Author: shishao
 * @Date:   2016-06-11 17:54:51
 * @Last Modified by:   shishao
 * @Last Modified time: 2016-06-11 20:15:52
 */
if(!function_exists('listToTree')){
    function listToTree($list, $pk='id', $pid = 'pid', $child = '_child', $root=0) {
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] = & $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] = & $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = & $refer[$parentId];
                        $parent[$child][] = & $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}


?>
