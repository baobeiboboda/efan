<?php

/**
 * 获取当前用户权限
 * @return integer 0-新人报名，大于0-各种团队的权限
 * @author efan_MouBo <efan_large@163.com>
 */
function what_permision()
{
	$user = session('user');
    if (empty($user)) {
    	if(MODULE_NAME == 'Recruit'){
    		return 0;
    	}else{
    		return -1;
    	}
    } else {
        if(empty($user['permision'])){
        	return -1;
        }else{
        	return $user['permision'];
        }
    }
}

function what_url()
{
    $user = session('user');
    if (empty($user)) {
        return 'PUBLIC_IMAGES/user-4.png';
    } else {
        if(empty($user['url'])){
            return 'PUBLIC_IMAGES/user-4.png';
        }else{
            return $user['url'];
        }
    }

}


/**
 * 生成短信验证码
 * @param  int $length 生成短信验证码的长度
 * @return boolean true-生成成功，false-生成失败
 * @author efan_MouBo <efan_large@163.com>
 */
function make_msgcode($length = null)
{
    if(session('?msgcode.code')){
        if(session('?msgcode.time')){
            $time = time();
            $time = $time - session('msgcode.time');
            if($time <= 300){
                session('msgcode.time',time());
                return session('?msgcode.code');
            }else{
                $length = is_null($length) ? C('MESSAGE_CODE_LENGTH') : $length;
                $str = '0123456789';
                $result = '';
                for($i=0;$i<$length;$i++){
                    $num[$i] = rand(0,9);
                    $result = $result.$str[$num[$i]];
                }
                session('msgcode.code',$result);
                session('msgcode.time',time());
                return session('?msgcode.code');
            }
        }else{
            $length = is_null($length) ? C('MESSAGE_CODE_LENGTH') : $length;
            $str = '0123456789';
            $result = '';
            for($i=0;$i<$length;$i++){
                $num[$i] = rand(0,9);
                $result = $result.$str[$num[$i]];
            }
            var_dump($result);
            session('msgcode.code',$result);
            session('msgcode.time',time());
            return session('?msgcode.code');
        }
    }else{
        $length = is_null($length) ? C('MESSAGE_CODE_LENGTH') : $length;
        $str = '0123456789';
        $result = '';
        for($i=0;$i<$length;$i++){
            $num[$i] = rand(0,9);
            $result = $result.$str[$num[$i]];
        }
        session('msgcode.code',$result);
        session('msgcode.time',time());
        return session('?msgcode.code');
    }
}

/**
 * 验证短信验证码
 * @param  string $code 输入的短信验证码
 * @return int 0-验证码为空，1-验证通过，2-验证码错误，3-验证码已失效
 * @author efan_MouBo <efan_large@163.com>
 */
function is_msgcode($code = null)
{
    if(is_null($code)){
        return 0;
    }else{
        $time = time();
        if($time - session('msgcode.time') > 300){
            return 3;
        }else{
            if($code != session('msgcode.code')){
                return 2;
            }else{
                return 1;
            }
        }
    }
}

/**
 * 发送短信
 * @param  string $phone 电话号码
 * @param  array $tpl_value 发送短信的内容
 * @param  int $type 发送短信的类型 1-敏感操作,2-团队通知,3-招新通知
 * @return array|mixed
 * @author efan_MouBo <efan_large@163.com>
 */
function send_msg($phone = null, $tpl_value = array(),$type = 0)
{
    header('content-type:text/html;charset=utf-8');
    /*在配置文件中已经设置好了聚合数据提供的接口URL http://v.juhe.cn/sms/send*/
    $sendUrl = C('SEND_MSG_URL');
    if(empty($phone)){
        return make_array(1001,'电话号码不能为空');
    }else{
        if(!is_array($tpl_value)){
            return make_array(1002,'短信内容不是数组');
        }else{
            if($type <= 0 || $type > 3){
                return make_array(1003,'短信类型不符合要求');
            }
        }
    }
    switch ($type) {
        case 1:
            if(in_array('operate' , array_keys($tpl_value))){
                $operate = $tpl_value['operate'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('name' , array_keys($tpl_value))){
                $name = $tpl_value['name'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('code' , array_keys($tpl_value))){
                $code = $tpl_value['code'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            $tpl_value = '#code#='.$code.'&#name#='.$name.'&#operate#='.$operate;
            $tpl_id = '9642';
            break;
        case 2:
            if(in_array('note' , array_keys($tpl_value))){
                $note = $tpl_value['note'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('name' , array_keys($tpl_value))){
                $name = $tpl_value['name'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            $tpl_value = '#note#='.$note.'&#name#='.$name;
            $tpl_id = '17136';
            break;
        case 3:
            if(in_array('time' , array_keys($tpl_value))){
                $time = date('Y年n月j日G时i分', $tpl_value['time']);
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('name' , array_keys($tpl_value))){
                $name = $tpl_value['name'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('number' , array_keys($tpl_value))){
                $number = $tpl_value['number'];
                if((int)$number <= 3 && (int)$number >= 1){
                    $address = (int)$number == 3 ? C('3RD_AUDITION_ADDRESS') : C('1ST_AUDITION_ADDRESS');
                }else{
                    return make_array(1004,'短信内容不符合要求');
                    break; 
                }
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            if(in_array('phone' , array_keys($tpl_value))){
                $ask_phone = $tpl_value['phone'];
            }else{
                return make_array(1004,'短信内容不符合要求');
                break;
            }
            // $time = date('Y年n月j日G时i分', $tpl_value['time']);
            // $name = $tpl_value['name'];
            // $number = $tpl_value['number'];
            // $address = (int)$number == 3 ? C('3RD_AUDITION_ADDRESS') : C('1ST_AUDITION_ADDRESS');
            // $phone = $tpl_value['phone'];
            $tpl_value = '#time#='.$time.'&#name#='.$name.'&#number#='.$number.'&#address#='.$address.'&#phone#='.$ask_phone;
            $tpl_id = '11634';
            break;
    }
    $smsConf = array(
    'key' => C('SEND_MSG_KEY'), //您申请的APPKEY'f755c0e9e5862251e09ec9d5555328eb'
    'mobile' => $phone, //接受短信的用户手机号码
    'tpl_id' => $tpl_id, //您申请的短信模板ID，根据实际情况修改
    'tpl_value' => $tpl_value //您设置的模板变量，根据实际情况修改
    );
    $content = juhecurl($sendUrl,$smsConf,1); //请求发送短信
    if($content){
        $result = json_decode($content,true);
        $error_code = $result['error_code'];
        if($error_code == 0){
            //状态为0，说明短信发送成功
            return make_array($error_code);
        }else{
            //状态非0，说明失败
            $msg = $result['reason'];
            return make_array($error_code,$msg);
        }
    }else{
        //返回内容异常，以下可根据业务逻辑自行修改
        return make_array(1005,'请求发送短信失败');
    }   
}

 
/**
 * 请求接口返回内容
 * @param  string $url 请求的URL地址
 * @param  string $params 请求的参数
 * @param  int $ipost 是否采用POST形式
 * @return  string
 * @author efan_MouBo <efan_large@163.com>
 */

function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
 
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}

/**
 * 发送短信返回数组构造
 * @param  int $code 返回码
 * @param  string $msg 返回内容
 * @return array
 * @author efan_MouBo <efan_large@163.com>
 */
function make_array($code, $msg = '')
{
    return array('code' => $code, 'msg' => $msg);
}

/**
 * 查询一个值是否在二维数组中
 * @param  string $value 待检测值
 * @param  string $array 检测二维数组
 * @return boolean true-属于，false-不属于
 * @author efan_MouBo <efan_large@163.com>
 */
function deep_in_array($value, $array) {   
    foreach($array as $item) {   
        if(!is_array($item)) {   
            if ($item == $value) {  
                return true;  
            } else {  
                continue;   
            }  
        }   
            
        if(in_array($value, $item)) {  
            return true;      
        } else if(deep_in_array($value, $item)) {  
            return true;      
        }  
    }   
    return false;   
}

/**
 * 随机生成表单校验值Token
 * @return string
 * @author efan_MouBo <efan_large@163.com>
 */
function getToken($len = 32, $md5 = true) {
  mt_srand((double) microtime() * 1000000);
  $chars = array (
    'Q',
    '@',
    '8',
    'y',
    '%',
    '^',
    '5',
    'Z',
    '(',
    'G',
    '_',
    'O',
    '`',
    'S',
    '-',
    'N',
    '<',
    'D',
    '{',
    '}',
    '[',
    ']',
    'h',
    ';',
    'W',
    '.',
    '/',
    '|',
    ':',
    '1',
    'E',
    'L',
    '4',
    '&',
    '6',
    '7',
    '#',
    '9',
    'a',
    'A',
    'b',
    'B',
    '~',
    'C',
    'd',
    '>',
    'e',
    '2',
    'f',
    'P',
    'g',
    ')',
    '?',
    'H',
    'i',
    'X',
    'U',
    'J',
    'k',
    'r',
    'l',
    '3',
    't',
    'M',
    'n',
    '=',
    'o',
    '+',
    'p',
    'F',
    'q',
    '!',
    'K',
    'R',
    's',
    'c',
    'm',
    'T',
    'v',
    'j',
    'u',
    'V',
    'w',
    ',',
    'x',
    'I',
    '$',
    'Y',
    'z',
    '*'
  );
  $numChars = count($chars) - 1;
  $token = '';
  # Create random token at the specified length
  for ($i = 0; $i < $len; $i++)
    $token .= $chars[mt_rand(0, $numChars)];
  # Should token be run through md5?
  if ($md5) {
    # Number of 32 char chunks
    $chunks = ceil(strlen($token) / 32);
    $md5token = '';
    # Run each chunk through md5
    for ($i = 1; $i <= $chunks; $i++)
      $md5token .= md5(substr($token, $i * 32 - 32, 32));
    # Trim the token
    $token = substr($md5token, 0, $len);
  }
  return $token;
}

/**
 * 加密解密算法
 * @param  string $string 待加密或者解密的字符串
 * @param  string $operation 默认为解密 加密为ENCODE，解密为DECODE
 * @param  string $key 密钥
 * @param  int $expiry 是否产生随机密钥
 * @return string 加密或者解密的结果
 * @author efan_MouBo <efan_large@163.com>
 */
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
    // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
    // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
    // 当此值为 0 时，则不产生随机密钥
    $ckey_length = 4;
 
    // 密匙
    if(C('ENCODE_KEY')){
        $GLOBALS['discuz_auth_key'] = C('ENCODE_KEY');
    }else{
        $GLOBALS['discuz_auth_key'] = 'JonathanWu';
    }
    $key = md5($key ? $key : $GLOBALS['discuz_auth_key']); 
 
    // 密匙a会参与加解密
    $keya = md5(substr($key, 0, 16));
    // 密匙b会用来做数据完整性验证
    $keyb = md5(substr($key, 16, 16));
    // 密匙c用于变化生成的密文
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
    // 参与运算的密匙
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    // 产生密匙簿
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上并不会增加密文的强度
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    // 核心加解密部分
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        // 从密匙簿得出密匙进行异或，再转成字符
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if($operation == 'DECODE') {
        // substr($result, 0, 10) == 0 验证数据有效性
        // substr($result, 0, 10) - time() > 0 验证数据有效性
        // substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 验证数据完整性
        // 验证数据有效性，请看未加密明文的格式
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}

/**
 * 加密后的字符串转换成可解析的base64url
 * @param  string $string 待base64url处理的字符串
 * @return string base64url处理后的字符串
 * @author efan_MouBo <efan_large@163.com>
 */
function urlsafe_b64encode($string) {
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
}

/**
 * base64url解析成加密字符串
 * @param  string $string base64url处理的字符串
 * @return string 原加密字符串
 * @author efan_MouBo <efan_large@163.com>
 */
function urlsafe_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}

function sendMail($to, $title, $content) {
     
    Vendor('PHPMailer.PHPMailerAutoload');     
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"Bug提交");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

function sendMailWithAtt($to,$title,$content,$filePath) {
    Vendor('PHPMailer.PHPMailerAutoload');     
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = '周报自动发送邮箱'; //发件人姓名
    $mail->AddAddress($to,"地主");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AddAttachment($filePath);
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    if($mail->Send()){
        return 'success';
    }else{
        return $mail->ErrorInfo;
    }
}

/**
 * 验证码核对
 */
function check_verify($code, $id='') {
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function uidWithYF($uid) {
    $len = strlen($uid);
    switch ($len) {
        case 2:
            $uid = 'YF_0' . $uid;
            return $uid;
            break;
        case 3:
            $uid = 'YF_' . $uid;
            return $uid;
            break;
    }
}