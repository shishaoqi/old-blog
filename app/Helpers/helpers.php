<?php
/**
 * @Author: shishao
 * @Date:   2016-06-11 17:54:51
 * @Last Modified by:   shishao
 * @Last Modified time: 2017-03-23 23:03:56
 */
use \Michelf\Markdown;

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

if(!function_exists('menuListToTree')){
    function menuListToTree($list, $pk='id', $pid = 'pid', $child = '_child', $root=0, $pathUrl='') {
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
                        if($list[$key]['name'] == $pathUrl){
                            $refer[$parentId]['active'] = true;
                            $list[$key]['active'] = true;
                        }
                        $parent = & $refer[$parentId];
                        $parent[$child][] = & $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}

if(!function_exists('markdownToHtml')){
    function markdownToHtml($content){
        //return $content;
        return Markdown::defaultTransform($content);
    }
}

if(!function_exists('p')){
    function p($str, $die=null){
        echo '<pre>' . print_r($str, true) . '</pre>';
        if(!empty($die)){
            exit();
        }
    }
}


?>
