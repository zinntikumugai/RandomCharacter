<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>乱数</title>
</head>
<body>
<?php

/* 変数宣言 */
	$strm    = '';	//生成文字元
	$strs    = '';	//生成文字
	$str_n   = '0123456789';
	$str_c   = 'abcdefghijklmnopqrstuvwxyz';
	$str_b   = 'ABCDEFGHIJLKMNOPQRSTUVWXYZ';
	$str_s   = "#$%&'()=~|-^[]{}:*+;?/!><";
	$str_h   = "あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわおんゑ";
	$str_k1  = "一右雨円王音下火花貝学気九休玉金空月犬見口校左三山子四糸字耳七車手十出女小上森人水正生青夕石赤千川先早草足村大男竹中虫町天田土二日入年白八百文木本名目立力林六五";
	$def_g_n = 8;	//デフォルトの生成文字数
	$encord  = 'UTF-8';	//文字エンコード
	$i       = 0;	//生成カウンター

/* 関数宣言 */
function chekis($arg) {
	if( !isset($arg) ) {return 0;}
	else { 
	if($arg != 1) {return $arg; }else {return 1;} 
	}
}

/* 入力データ状態取得 */
	$nm  = $_GET['number'];
	$ch  = $_GET['chaer'];
	$chb = $_GET['chaerb'];
	$chs = $_GET['chaers'];
	$chh = $_GET['chaerh'];
	$chk1= $_GET['chaerk1'];
	$gn  = $_GET['gn'];

/* 生成数存在チェック */
	if( $gn == null ) { $gn = $def_g_n; }
	if( $gn < 0 ) { $gn = $def_g_n; }
	if( ( $gn % 1 )==$gn) { $gn = $def_g_n; }

/* 表示したて、何もチェックを入れていないとき、数字モードに強制 */
	if($nm != 1 && $ch != 1 && $chb != 1 && $chs != 1 && $chh != 1 && $chk1 != 1 ) { $nm = 1; }

/* NULL->0 */
	$nm  = chekis($nm );
	$ch  = chekis($ch );
	$chb = chekis($chb);
	$chs = chekis($chs); 
	$chh = chekis($chh);
	$chk1= chekis($chk1);

/* 生成文字列元作成 */
	if($nm  == 1) { $strm .= $str_n; }
	if($ch  == 1) { $strm .= $str_c; }
	if($chb == 1) { $strm .= $str_b; }
	if($chs == 1) { $strm .= $str_s; }
	if($chh == 1) { $strm .= $str_h; }
	if($chk1== 1) { $strm .= $str_k1; }

/* 生成文字列元の文字数 */
	$strm_len = mb_strlen( $strm, $encord ) - 1;

/* 乱数生成 */
	for( ; $i < $gn; $i++) {
		$strs .= mb_substr( $strm, mt_rand(0, $strm_len), 1 ,$encord );
	}
?>

	<h1>乱数生成</h1><br>
	<p>乱数を生成します。<br>生成タイプのいずれかにチェックを入れて、生成文字数に必要な文字数を入力して、生成ボタンを押してください。</p>
	<form action="index.php" method="get">
		<p>生成タイプ:
		<input type="checkbox" name="number" value="1" <?php if($nm  == 1) {print('checked="checked"');} ?> >数字
		<input type="checkbox" name="chaer"  value="1" <?php if($ch  == 1) {print('checked="checked"');} ?> >英字(小)
		<input type="checkbox" name="chaerb" value="1" <?php if($chb == 1) {print('checked="checked"');} ?> >英字(大)
		<input type="checkbox" name="chaers" value="1" <?php if($chs == 1) {print('checked="checked"');} ?> >記号
		<input type="checkbox" name="chaerh" value="1" <?php if($chh == 1) {print('checked="checked"');} ?> >ひらがな
		<input type="checkbox" name="chaerk1" value="1" <?php if($chk1== 1) {print('checked="checked"');} ?> >漢字(小1)
		</p>
		<p>もととなる文字の数 : <?php print($strm_len+1); ?></p>
		<p>生成文字数<input type= "text" name="gn" value="<?php print($gn); ?>"></p>
		<input type="submit" value="生成">
		<p>生成文字<input type="text" name="" value="<?php print($strs); ?>"></p>
		
	</form>
	<div>
		<p><a href="https://github.com/zinntikumugai/RandomCharacter">ソース</a></p>
		<p>&copy; 人畜無害 - zinntiku.pe.hu</p>
	</div>
	
</body>
</html>
