<?php
//ヘッダー
include("header.php");
//データファイル
include("datas.php");
//関数ファイル
include("function.php");
//コンフィグファイル
include("config.php");

//初期設定
$g_n = $def_g_n;

//すべてのリスト
$All_list = array(
    $str_n,
    $str_sc,
    $str_bc,
    $str_s1,
    $str_s2,
    $str_h,
    $str_k1,
    $str_k2,
);
//をシャッフルする(参照元データ)

foreach ($All_list as &$value) {
    shuffledata($value);
}


//GETから取得
$list = array( 0, 0, 0, 0, 0, 0, 0, 0, );
$cnt= 0;
$chek = 0;
foreach ($show as $value) {
    $list[$cnt] = chekGET($value[0]);
    $chek += $list[$cnt];
    $cnt +=1;
}

//生成数が正しくないときはデフォルト
@$g_n = $_GET['gn'];
if( !isset($g_n) || $g_n=='') {
    $g_n = $def_g_n;
}

//何もチェックを入れていないので数字に固定
if($chek<=0) {
    $list[0] = 1;
}

//参照元作成
$cnt = 0;
$meta = array();
foreach ($list as $value) {
    if( $value==1 ) {
        $meta = magedata($meta, $All_list[$cnt]);
    }
    $cnt +=1;
}

//さらにシャッフル
shuffledata($meta);

$meta_len = sizeof($meta, COUNT_RECURSIVE);
//mb_substrだと連想配列から抜き出せないから変数に置き換える
$str = $meta;
$meta = "";
foreach ($str as $value) {
    $meta .= $value;
}
//生成
$str = "";
for($cnt=0; $cnt<$g_n; $cnt++) {
    $str .= mb_substr( $meta, mt_rand(0, $meta_len), 1, $encord);
}
$gn_len = mb_strlen($str, $encord) + 2;

//結果を出力
$cnt = 0;
foreach ($show as $value) {
    echo "\t\t\t" .'<input type="checkbox" name="' .$value[0] .'" ' ."\t" .'value="1" ' .ischekd($list[$cnt]) .'>' .$value[1] ."\n";
    $cnt += 1;
}
echo "\t\t</p>\n";
echo "\t\t<p>もととなる文字列の数：" .$meta_len ."</p>\n";
echo "\t\t<p>生成文字数\n";
echo "\t\t\t" .'<input tyoe="text" name="gn" value="' .$g_n .'">' ."\n";
echo "\t\t\t" .'<input type="submit" value="生成">' ."\n";
echo "\t\t" .'<p>生成文字' ."\n";
echo "\t\t\t" .'<input id="out" type="text" name="" value="' .$str .'" size="' .$gn_len .'">' ."\n";
include("futter.php");





//shuffle($str_sc);

//print_r($str_sc);

//shuffledata($str_sc);
//print_r($str_sc);
/*
//ランダム化
$test = array_merge($str_n, $str_sc, $str_bc, $str_s1, $str_s2, $str_h);
print("<br>\n<br>\n");
print_r($test);
shuffle($test);
print("<br>\n<br>\n");
print_r($test);
*/
?>
