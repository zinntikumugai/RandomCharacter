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
	#漢字小学1年生 参考 http://kakijun.jp/main/SGixmain1.html
	$str_k1  = "一右雨円王音下火花貝学気九休玉金空月犬見口校左三山子四糸字耳七車手十出女小上森人水正生青夕石赤千川先早草足村大男竹中虫町天田土二日入年白八百文木本名目立力林六五";
	#漢字小学2年生 参考 https://ja.wikibooks.org/wiki/%E5%B0%8F%E5%AD%A6%E6%A0%A1%E5%9B%BD%E8%AA%9E/%E6%BC%A2%E5%AD%97/2%E5%B9%B4%E7%94%9F%E3%81%A7%E7%BF%92%E3%81%86%E6%BC%A2%E5%AD%97
	$str_k2  = "引羽雲園遠何科夏家歌 画回会海絵外角楽活間丸岩顔汽記帰弓牛魚京強教近兄形計元言原戸古午後語工公広交光考行高黄合谷国黒今才細作算止市矢姉思紙寺自時室社弱首秋週春書少場色食心新親図数西声星晴切雪船線前組走多太体台地池知茶昼長鳥朝直通弟店点電刀冬当東答頭同道読内南肉馬売買麦半番父風分聞米歩母方北毎妹万明鳴毛門夜野友用曜来里理話";
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

function printchecked($arg) {
	if( $arg == 1) {
		print('checked="checked"');
	}
}

/* 入力データ状態取得 */
	$nm  = $_GET['number'];
	$ch  = $_GET['chaer'];
	$chb = $_GET['chaerb'];
	$chs = $_GET['chaers'];
	$chh = $_GET['chaerh'];
	$chk1= $_GET['chaerk1'];
	$chk2= $_GET['chaerk2'];
	$gn  = $_GET['gn'];

/* 生成数存在チェック */
	if( $gn == null ) { $gn = $def_g_n; }
	if( $gn < 0 ) { $gn = $def_g_n; }
	if( ( $gn % 1 )==$gn) { $gn = $def_g_n; }

/* 表示したて、何もチェックを入れていないとき、数字モードに強制 */
	if($nm != 1 && $ch != 1 && $chb != 1 && $chs != 1 && $chh != 1 && $chk1 != 1 && $chk2 != 1 ) { $nm = 1; }

/* NULL->0 */
	$nm  = chekis($nm );
	$ch  = chekis($ch );
	$chb = chekis($chb);
	$chs = chekis($chs); 
	$chh = chekis($chh);
	$chk1= chekis($chk1);
	$chk2= chekis($chk2);

/* 生成文字列元作成 */
	if($nm  == 1) { $strm .= $str_n; }
	if($ch  == 1) { $strm .= $str_c; }
	if($chb == 1) { $strm .= $str_b; }
	if($chs == 1) { $strm .= $str_s; }
	if($chh == 1) { $strm .= $str_h; }
	if($chk1== 1) { $strm .= $str_k1; }
	if($chk2== 1) { $strm .= $str_k2; }

/* 生成文字列元の文字数 */
	$strm_len = mb_strlen( $strm, $encord ) - 1;

/* 乱数生成 */
#参考 http://webkaru.net/php/function-substr/
	for( ; $i < $gn; $i++) {
		$strs .= mb_substr( $strm, mt_rand(0, $strm_len), 1 ,$encord );
	}
?>

	<h1>乱数生成</h1><br>
	<p>乱数を生成します。<br>生成タイプのいずれかにチェックを入れて、生成文字数に必要な文字数を入力して、生成ボタンを押してください。</p>
	<h1>生成された文字はサーバー上に記録されません。</h1>
	<form action="index.php" method="get">
		<p>生成タイプ:
		<input type="checkbox" name="number" value="1" <?php printchecked($nm) ?> >数字
		<input type="checkbox" name="chaer"  value="1" <?php printchecked($ch  == 1); ?> >英字(小)
		<input type="checkbox" name="chaerb" value="1" <?php printchecked($chb == 1); ?> >英字(大)
		<input type="checkbox" name="chaers" value="1" <?php printchecked($chs == 1); ?> >記号
		<input type="checkbox" name="chaerh" value="1" <?php printchecked($chh == 1); ?> >ひらがな
		<input type="checkbox" name="chaerk1" value="1" <?php printchecked($chk1== 1); ?> >漢字(小1)
		<input type="checkbox" name="chaerk2" value="1" <?php printchecked($chk2== 1); ?> >漢字(小2)
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
