<?php
//データをシャッフル
function shuffledata(&$data) {
    shuffle($data);
}

//データを結合する
function magedata($data1, $data2) {
    return array_merge($data1, $data2);
}

function chekGET($data) {
    @$tmp = $_GET[$data];
    if( !isset($tmp) || $tmp=='' ) {
        return 0;
    }else {
        return 1;
    }
}

function ischekd($data) {
    if($data==1) {
        return 'checked="checked"';
    }
}
?>
