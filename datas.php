<?php
/* 使うデータのリスト */

//数字
    //$str_n = { 0, 1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 };
    $str_n = array(
        0, 1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 );
//半角小文字英字
    $str_sc = array(
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n',
        'o','p','q','r','s','t','u','v','w','x','y','z' );
//半角大文字英字
    $str_bc = array(
        'A','B','C','D','E','F','G','H','I','J','L','K','M','N',
        'O','P','Q','R','S','T','U','V','W','X','Y','Z');
//記号1
    $str_s1 = array(
        '#', '%', '$', '&', '(', ')', '-', '+', '*', '[', '=', '^', '|', ']',
        '{', '}', ':', '?', '>', '<', );
//記号2(エラーが起こる可能性がある)
    $str_s2 = array(
        '\'', '\\', ';', '.', '!', );
//ひらがな
    $str_h = array(
        'あ', 'い', 'う', 'え', 'お',
        'か', 'き', 'く', 'け', 'こ',
        'さ', 'し', 'す', 'せ', 'そ',
        'た', 'ち', 'つ', 'て', 'と',
        'な', 'に', 'ぬ', 'ね', 'の',
        'は', 'ひ', 'ふ', 'へ', 'ほ',
        'ま', 'み', 'む', 'め', 'も',
        'や', 'ゆ', 'よ',
        'ら', 'り', 'る', 'れ', 'ろ',
        'わ', 'お', 'ん', 'ゑ' );
//漢字小1
    $str_k1 = array(
        '一', '右', '雨', '円', '王', '音', '下', '火', '花', '貝', '学', '気',
        '九', '休', '玉', '金', '空', '月', '犬', '見', '口', '校', '左', '三',
        '山', '子', '四', '糸', '字', '耳', '七', '車', '手', '十', '出', '女',
        '小', '上', '森', '人', '水', '正', '生', '青', '夕', '石', '赤', '千',
        '川', '先', '早', '草', '足', '村', '大', '男', '竹', '中', '虫', '町',
        '天', '田', '土', '二', '日', '入', '年', '白', '八', '百', '文', '木',
        '本', '名', '目', '立', '力', '林', '六', '五' );
//漢字小2
    $str_k2 = array(
        '引', '羽', '雲', '園', '遠', '何', '科', '夏', '家', '歌', '画', '回',
        '会', '海', '絵', '外', '角', '楽', '活', '間', '丸', '岩', '顔', '汽',
        '記', '帰', '弓', '牛', '魚', '京', '強', '教', '近', '兄', '形', '計',
        '元', '言', '原', '戸', '古', '午', '後', '語', '工', '公', '広', '交',
        '光', '考', '行', '高', '黄', '合', '谷', '国', '黒', '今', '才', '細',
        '作', '算', '止', '市', '矢', '姉', '思', '紙', '寺', '自', '時', '室',
        '社', '弱', '首', '秋', '週', '春', '書', '少', '場', '色', '食', '心',
        '新', '親', '図', '数', '西', '声', '星', '晴', '切', '雪', '船', '線',
        '前', '組', '走', '多', '太', '体', '台', '地', '池', '知', '茶', '昼',
        '長', '鳥', '朝', '直', '通', '弟', '店', '点', '電', '刀', '冬', '当',
        '東', '答', '頭', '同', '道', '読', '内', '南', '肉', '馬', '売', '買',
        '麦', '半', '番', '父', '風', '分', '聞', '米', '歩', '母', '方', '北',
        '毎', '妹', '万', '明', '鳴', '毛', '門', '夜', '野', '友', '用', '曜',
        '来', '里', '理', '話', '引', '羽', '雲', '園', '遠', '何', '科', '夏',
        '家', '歌', '画', '回', '会', '海', '絵', '外', '角', '楽', '活', '間',
        '丸', '岩', '顔', '汽', '記', '帰', '弓', '牛', '魚', '京', '強', '教',
        '近', '兄', '形', '計', '元', '言', '原', '戸', '古', '午', '後', '語',
        '工', '公', '広', '交', '光', '考', '行', '高', '黄', '合', '谷', '国',
        '黒', '今', '才', '細', '作', '算', '止', '市', '矢', '姉', '思', '紙',
        '寺', '自', '時', '室', '社', '弱', '首', '秋', '週', '春', '書', '少',
        '場', '色', '食', '心', '新', '親', '図', '数', '西', '声', '星', '晴',
        '切', '雪', '船', '線', '前', '組', '走', '多', '太', '体', '台', '地',
        '池', '知', '茶', '昼', '長', '鳥', '朝', '直', '通', '弟', '店', '点',
        '電', '刀', '冬', '当', '東', '答', '頭', '同', '道', '読', '内', '南',
        '肉', '馬', '売', '買', '麦', '半', '番', '父', '風', '分', '聞', '米',
        '歩', '母', '方', '北', '毎', '妹', '万', '明', '鳴', '毛', '門', '夜',
        '野', '友', '用', '曜', '来', '里', '理', '話', '羽', '雲', '園', '遠',
        '何', '科', '夏', '家', '歌', '画', '回', '会', '海', '絵', '外', '角',
        '楽', '活', '間', '丸', '岩', '顔', '汽', '記', '帰', '弓', '牛', '魚',
        '京', '強', '教', '近', '兄', '形', '計', '元', '言', '原', '戸', '古',
        '午', '後', '語', '工', '公', '広', '交', '光', '考', '行', '高', '黄',
        '合', '谷', '国', '黒', '今', '才', '細', '作', '算', '止', '市', '矢',
        '姉', '思', '紙', '寺', '自', '時', '室', '社', '弱', '首', '秋', '週',
        '春', '書', '少', '場', '色', '食', '心', '新', '親', '図', '数', '西',
        '声', '星', '晴', '切', '雪', '船', '線', '前', '組', '走', '多', '太',
        '体', '台', '地', '池', '知', '茶', '昼', '長', '鳥', '朝', '直', '通',
        '弟', '店', '点', '電', '刀', '冬', '当', '東', '答', '頭', '同', '道',
        '読', '内', '南', '肉', '馬', '売', '買', '麦', '半', '番', '父', '風',
        '分', '聞', '米', '歩', '母', '方', '北', '毎', '妹', '万', '明', '鳴',
        '毛', '門', '夜', '野', '友', '用', '曜', '来', '里', '理', '話' );

$show = array(
    // name, 表示名
    array('str_n', '数字'),
    array('str_sc', '英字(小)'),
    array('str_bc', '英字(大)'),
    array('str_s1', '記号(普)'),
    array('str_s2', '記号(特)'),
    array('str_h', 'ひらがな'),
    array('str_k1', '漢字(小1)'),
    array('str_k2', '漢字(小2)'),
);
?>
