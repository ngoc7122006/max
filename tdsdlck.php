<?php
error_reporting(0);
session_start();
$ress = "\033[0;32m";
$res = "\033[0;33m";
$red = "\033[0;31m";
$green = "\033[0;37m";
$yellow = "\033[0;33m";
$white = "\033[0;33m";
$banner = "\r";
$tim="\033[1;35m";
$xduong="\033[1;36m";
$xnhac = "\033[1;96m";
$den = "\033[1;90m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
date_default_timezone_set("Asia/Ho_Chi_Minh");
system('clear');
 echo "\r

\033[1;31m████████╗████████╗██████╗ ██╗  ██╗ █████╗ 
\033[1;32m╚══██╔══╝╚══██╔══╝╚════██╗██║ ██╔╝██╔══██╗
\033[1;33m   ██║      ██║    █████╔╝█████╔╝ ╚█████╔╝
\033[1;34m   ██║      ██║   ██╔═══╝ ██╔═██╗ ██╔══██╗
\033[1;35m   ██║      ██║   ███████╗██║  ██╗╚█████╔╝
\033[1;36m   ╚═╝      ╚═╝   ╚══════╝╚═╝  ╚═╝ ╚════╝  
\n";
$dem = 0;
 $_SESSION['check'] = file_exists("Tokentds.txt");
if ($_SESSION['check'] =='1'){
echo  $white." ● ".$ress."Bạn Đã Đăng Nhập$xduong TOKEN Trao Đổi Sub$ress Trước Đó. Bấm $tim Enter $ress Để Tiếp Tục, Bấm $red No $ress Để Đăng Nhập Token mới: ";
$_SESSION['nhap'] = trim(fgets(STDIN));
if ($_SESSION['nhap'] !='no' and $_SESSION['nhap'] != 'No' and $_SESSION['nhap'] !=''){
echo $white."●".$red."Sai Định Dạng\n";
exit;
}
if ($_SESSION['nhap'] =='no' or $_SESSION['nhap'] =='No'){
$my = fopen("Tokentds.txt", "w+");
echo $ress."Nhập Token TDS : $yellow ";
$tokenacc = trim(fgets(STDIN));
$arr = array("tokenacc"=> $tokenacc);
fwrite($my,json_encode($arr));
    $my = file("Tokentds.txt");
$bb = file_get_contents('Tokentds.txt');
$cc =json_decode($bb);
$tokenacc= $cc->{"tokenacc"};

}
if ($_SESSION['nhap'] == ''){
$bb = file_get_contents("Tokentds.txt");
$cc =json_decode($bb);
$tokenacc= $cc->{"tokenacc"};
}
} else {
$my = fopen("Tokentds.txt","w+");
echo $ress."Nhập Token TDS : $yellow ";
$tokenacc = trim(fgets(STDIN));
$arr = array("tokenacc"=> $tokenacc);
fwrite($my,json_encode($arr));
}
//cookie 
echo "\n\033[1;32m bạn đã đăng nhập vài cookie trước đó\n";
$khocookie = [];
if (file_exists('cookie.txt')){
	echo $ress."Nhấn".$hong." 'Enter' ".$ress."Để Giữ Cookie ".$red."| ".$ress."Nhập ".$tim."'yes' ".$ress."Để Xoá Cookie\n==> ";
	$choice=trim(fgets(STDIN));
	if ($choice=='yes'){
		@system('rm cookie.txt');
		}
	}
if (!file_exists('cookie.txt')){
$mangcookie =[];
for($a = 1; $a < 99999999;$a++){
echo $luc."Nhập Cookie Thứ $a: $vang";
$nhapck = (string)trim(fgets(STDIN));
if($nhapck == ''){break;}
array_push($khocookie,$nhapck);
    }
			$js=json_encode($khocookie);
			$demcki=count($khocookie);
			$k = fopen("cookie.txt","a+");
fwrite($k, $js);
fclose($k);
echo $green."Tìm Thấy $demcki Cookie\n";
	}else{
		$khocookie = json_decode(fread(fopen("cookie.txt","r"),filesize("cookie.txt")),true);
		$demcki = count($khocookie);
	}
//url
$urlinfo = "https://traodoisub.com/api/?fields=profile&access_token=$tokenacc";
$urllike = "https://traodoisub.com/api/?fields=like&access_token=$tokenacc";
$urlsub = "https://traodoisub.com/api/?fields=follow&access_token=$tokenacc";
$urlcx = "https://traodoisub.com/api/?fields=reaction&access_token=$tokenacc";
$urlshare = "https://traodoisub.com/api/?fields=share&access_token=$tokenacc";
$urlcmt = "https://traodoisub.com/api/?fields=comment&access_token=$tokenacc";
$urlpage = "https://traodoisub.com/api/?fields=page&access_token=$tokenacc";
$urlgr = "https://traodoisub.com/api/?fields=group&access_token=$tokenacc";
$urllikecmt = "https://traodoisub.com/api/?fields=reactcmt&access_token=$tokenacc";
//login
$info = api($urlinfo);
if ($info["error"]) {
    exit ($info["error"]);
}
//$thongtin
$user = strtolower($info["data"]["user"]);
$xuhientai = $info["data"]["xu"];
system('clear');
echo $vang."\n";
echo "\033[1;33m─────────────────────────────────────────────────────────────────
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;93mTrao Đổi Sub Đa Luồng cookie - login token
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mFacebook: \033[1;96mNguyễn Tuấn anh
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mTìm Theo ID: \033[1;93m@anhzoe1801
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mZalo: \033[1;95m0363449824
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mwebsite: \033[1;32mhttp://tuthan2k8.com
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mYoutube: \033[1;34mTử Thần 2K8
\033[1;31m[".$luc."●".$do."] ".$trang."=> \033[1;97mMoMo: \033[1;31m0363449824
\033[1;33m─────────────────────────────────────────────────────────────────\n";
echo "\033[1;31m[".$luc."●".$do."] ".$trang."=> ".$luc."               Thông Tin: ".$vang."\n";
echo "\033[1;31m[".$luc."●".$do."] ".$trang."=> ".$luc."Tài Khoản TDS : ".$vang.$user."\n";
echo "\033[1;31m[".$luc."●".$do."] ".$trang."=> ".$luc."Số Xu Hiện Tại : ".$vang.$xuhientai."\n";
echo "\033[1;31m[".$luc."●".$do."] ".$trang."=> ".$luc."Số Acc Đang Chạy : ".$vang.$demcki."\n";
echo "\033[1;33m─────────────────────────────────────────────────────────────────\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."1".$do."]".$luc." Chạy Nhiệm Vụ Like\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."2".$do."]".$luc." Chạy Nhiệm Vụ Follow\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."3".$do."]".$luc." Chạy Nhiệm Vụ Cảm xúc\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."4".$do."]".$luc." Chạy Nhiệm Vụ Comment\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."5".$do."]".$luc." Chạy Nhiệm Vụ Fanpage\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."6".$do."]".$luc." Chạy Nhiệm Vụ Share\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."7".$do."]".$luc." Chạy Nhiệm Vụ Tham Gia Group\n";
echo $trang."=> ".$luc."Nhập ".$do."[".$vang."8".$do."]".$luc." Chạy Nhiệm Vụ Cảm Xúc Comment\n";
echo $trang."=> ".$yellow."Ví dụ bạn muốn làm random nv like,Follow,cảm xúc thì điền 123\n";
echo "\033[1;33m─────────────────────────────────────────────────────────────────\n";
echo $trang."=> ".$luc."Nhập Số Để Chạy Nhiệm Vụ: $vang";
$nhiemvu = trim(fgets(STDIN));
echo $trang."=> ".$luc."Nhập Thời Gian Delay Tối Thiểu ( delay MIN ) : $vang";
$min=trim(fgets(STDIN));
echo $trang."=> ".$luc."Nhập Thời Gian Delay Tối Đa ( delay MAX ) : $vang";
$max=trim(fgets(STDIN));
$delay = rand($min,$max);
echo $trang."=> ".$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Kích Hoạt Chống Block: $vang";
$xxxxx = trim(fgets(STDIN));
echo $trang."=> ".$luc."Sau ".$vang.$xxxxx.$luc." Nhiệm Vụ Nghỉ Ngơi Bao Nhiêu Giây: $vang";
$delaybl = trim(fgets(STDIN));
echo $trang."=> ".$luc."Chuyển Nick Sau Bao Nhiêu Nhiệm Vụ: $vang";
$doinick = trim(fgets(STDIN));
echo "\033[1;33m─────────────────────────────────────────────────────────────────\n";
while(true){
  foreach ($khocookie as $cookie){
$access_token = laytoken($cookie);
if (strpos($access_token, 'EAAAA') !== 0) {
    echo "Cookie die!!?! \n";
    continue;
}
$tenfb = json_decode(file_get_contents('https://graph.facebook.com/me/?access_token='.$access_token))-> {'name'};
$idfb = json_decode(file_get_contents('https://graph.facebook.com/me/?access_token='.$access_token))-> {'id'};
$urlcauhinh = "https://traodoisub.com/api/?fields=run&id=$idfb&access_token=$tokenacc";
$cauhinh = api($urlcauhinh);
if ($cauhinh["data"]["msg"] == "Cấu hình thành công!") {
        echo $vang."Đang Cấu Hình ID: ".$tim.$idfb." ".$vang."Tên FB: ".$xduong.$tenfb."".$res."\n";
} else {
    echo "Cấu hình $idfb thất bại\n";
}
$spam = 0;
while (true) {
    if ($spam == 1) {
        break;
    }
    //listlike
    if (strpos($nhiemvu, '1') !== false) {
        for ($i = 0; $i < 30; $i++) {
            $listlike = api($urllike);
            if (count($listlike) !== 0) {
                break;
            }}
    }
    //listfollow
    if (strpos($nhiemvu, '2') !== false) {
        while (true) {
            $listsub = api($urlsub);
            if (count($listsub) !== 0) {
                break;
            }
        }}
    //listreaction
    if (strpos($nhiemvu, '3') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listcx = api($urlcx);
            if (count($listcx) !== 0) {
                break;
            }}
    }
    //listcmt
    if (strpos($nhiemvu, '4') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listcmt = api($urlcmt);
            if (count($listcmt) !== 0) {
                break;
            }}
    }
    //listpage
    if (strpos($nhiemvu, '5') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listpage = api($urlpage);
            if (count($listpage) !== 0) {
                break;
            }}
    }
    //share
    if (strpos($nhiemvu, '6') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listshare = api($urlshare);
            if (count($listshare) > 0) {
                break;
            }}
    }
    //group
     if (strpos($nhiemvu, '7') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listgr = api($urlgr);
            if (count($listgr) > 0) {
                break;
            }}
                }
    if (strpos($nhiemvu, '8') !== false) {
        for ($i = 1; $i < 30; $i++) {
            $listlikecmt = api($urllikecmt);
            if (count($listlikecmt) > 0) {
                break;
            }}
                }
    for ($lap = 0; $lap < 20; $lap++) {
        // like
        if ($listlike !== NULL) {
            $idlike = $listlike[$lap]["id"];
            if ($idlike !== '') {
                $g = like($access_token, $idlike, $cookie);
                if ($g -> {'error'} -> {'code'} == 190) {
                    echo "Cookie die !!?!\n";
                    array_splice($khocookie,$xz,1);
                    $spam = 1; break;
                }
                if ($g -> {'error'} -> {'code'} == 368) {
                    echo "\033[1;91m".$g-> {'error'}-> {'message'};
                    echo "\n";
                    $spam = 1; break;
                }
                if ($g -> {'error'} -> {'code'} == 405) {
                    echo "\033[1;91m"."Tài khoản bị checkpoint";
                    $spam = 1; break;
                }
                $nhanlike = nhantien('LIKE', $idlike, $tokenacc);
                if ($nhanlike["success"] == 200) {
                    $xu = $nhanlike["data"]["xu"];
                    $xujob = $nhanlike["data"]["msg"];
                    $dem++;
                    hoanthanh($dem, ' LIKE ', $idlike, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }}
        //follow
        if ($listsub !== NULL) {
            $idsub = $listsub[$lap]["id"];
            if ($idsub !== '') {
                $g = follow($access_token, $idsub, $cookie);
                if ($g -> {'error'} -> {'code'} == 190) {
                    echo "Cookie die !!?!\n";
                    array_splice($khocookie,$xz,1);
                    $spam = 1; break;
                }
                if ($g -> {'error'} -> {'code'} == 368) {
                    echo "\033[1;91m".$g-> {'error'}-> {'message'};
                    echo "\n";
                    $spam = 1; break;
                }
                if ($g -> {'error'} -> {'code'} == 405) {
                    echo "\033[1;91m"."Tài khoản bị checkpoint";
                    $spam = 1; break;
                }
                $nhansub = nhantien('FOLLOW', $idsub, $tokenacc);
                if ($nhansub["success"] == 200) {
                    $xu = $nhansub["data"]["xu"];
                    $xujob = $nhansub["data"]["msg"];
                              $dem++;
                    hoanthanh($dem, 'FOLLOW', $idsub, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }}
        //cảm xúc
        if ($listcx !== NULL) {
            $idcx = $listcx[$lap]["id"];
            $type = $listcx[$lap]["type"];
            if ($idcx !== '') {
                camxuc($idcx, $type, $cookie);
                $nhancx = nhantien('LOVE', $idcx, $tokenacc);
                if ($nhancx["success"] == 200) {
                    $xu = $nhancx["data"]["xu"];
                    $xujob = $nhancx["data"]["msg"];
                    $dem++;
                    if ($type == 'WOW') {
                        $type = ' WOW ';
                    } elseif ($type == 'SAD') {
                        $type = ' SAD ';
                    } elseif ($type == 'ANGRY') {
                        $type = ' ANGRY ';
                    } elseif ($type == 'LOVE') {
                        $type = ' LOVE ';
                    } elseif ($type == 'HAHA') {
                        $type = ' HAHA ';
                    }
                    hoanthanh($dem, $type, $idcx, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }}
            if ($listshare !== NULL) {
                $idshare = $listshare[$lap]["id"];
                if (isset($idshare)) {
                    $r = share($access_token, $idshare);
                    $g = json_decode($r);
                    if ($g -> {'error'} -> {'code'} == 190) {
                        echo "Token die !!?!\n";
                        
                        $spam = 1; break;
                    }
                    if ($g -> {'error'} -> {'code'} == 368) {
                        echo "\033[1;91m".$g-> {'error'}-> {'message'};
                        echo "\n";
                        $spam = 1; break;
                    }
                    if ($g -> {'error'} -> {'code'} == 405) {
                        echo "\033[1;91m"."Tài khoản bị checkpoint";
                        
                        $spam = 1; break;
                    }
                    if (strpos($r, '"id"')){
                        $nhanshare = nhantien('SHARE', $idshare, $tokenacc);
                        if ($nhanshare["success"] == 200) {
                            $xu = $nhanshare["data"]["xu"];
                            $xujob = $nhanshare["data"]["msg"];
                            $dem++;
                            hoanthanh($dem, 'SHARE ', $idshare, $xujob, $xu);
                            if($dem % $doinick == 0){
                              $spam = 1; break;
                            }
                            if($dem % $xxxxx == 0){
                              delay($delaybl);
                            }
                            
                            delay($delay);
                        }

                    }else{
                        echo $r;
                    }

                }else{
                    break;
                }
            }
        //cmt
        if ($listcmt !== NULL) {
            $idcmt = $listcmt[$lap]["id"];
            $msg = $listcmt[$lap]["msg"];
            if ($idcmt !== '') {
                cmt($access_token, $idcmt, $cookie, $msg);
                $nhancmt = nhantien('COMMENT', $idcmt, $tokenacc);
                if ($nhancmt["success"] == 200) {
                    $xu = $nhancmt["data"]["xu"];
                    $xujob = $nhancmt["data"]["msg"];
                    $dem++;
                    hoanthanh($dem, ' CMT  ', $idcmt, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }}
        //page
        if ($listpage !== NULL) {
            $idpage = $listpage[$lap]["id"];
            if ($idpage !== '') {
                page($idpage, $cookie);
                $nhanpage = nhantien('PAGE', $idpage, $tokenacc);
                if ($nhanpage["success"] == 200) {
                    $xu = $nhanpage["data"]["xu"];
                    $xujob = $nhanpage["data"]["msg"];
                    $dem++;
                    hoanthanh($dem, ' PAGE ', $idpage, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }
        }
		 //group 
      if ($listgr !== NULL) {
            $idgr = $listgr[$lap]["id"];
            if ($idgr !== '') {
                joingr($idgr,$cookie);
                $nhangr = nhantien('GROUP', $idgr, $tokenacc);
                if ($nhangr["success"] == 200) {
                    $xu = $nhangr["data"]["xu"];
                    $te=json_decode(file_get_contents('https://graph.facebook.com/?ids='.$idgr.'&fields=id,name&access_token='.$access_token), true);
	                $ten=$te[$idpage]["name"];
                    $xujob = $nhangr["data"]["msg"];
                    $dem++;
                    hoanthanh($dem, 'GROUP ', $idgr, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay1($delaybl);
                    }           
                    delay($delay);
                }
            }
}
     //likecmt
      if ($listlikecmt !== NULL) {
            $idlikecmt = $listlikecmt[$lap]["id"];
            $type = $listlikecmt[$lap]["type"];
            if ($idlikecmt !== '') {
                if ($type == 'LIKE'){
                    like($access_token, $idlikecmt, $cookie);
                }else{
                    camxuc($idlikecmt, $type, $cookie);
                }               
                $nhanpage = nhantien($type.'CMT', $idlikecmt, $tokenacc);
                if ($nhanpage["success"] == 200) {
                    $xu = $nhanpage["data"]["xu"];
                    $xujob = $nhanpage["data"]["msg"];
                    $dem++;
                    hoanthanh($dem, $type, $idlikecmt, $xujob, $xu);
                    if($dem % $doinick == 0){
                      $spam = 1; break;
                    }
                    if($dem % $xxxxx == 0){
                      delay($delaybl);
                    }
                    
                    delay($delay);
                }
            }
        }
}}}}
function api($url) {
    $head = array(
        "Host: traodoisub.com",
        "cache-control: max-age=0",
        "upgrade-insecure-requests: 1",
        "user-agent: Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.110 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: none",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
        //"accept-encoding: gzip, deflate, br",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
    );
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_RETURNTRANSFER => 1
    ));
    $get = curl_exec($ch);
    curl_close($ch);
    return json_decode($get, true);
}
function nhantien($type, $id, $tokenacc) {
    $nhan = file_get_contents("https://traodoisub.com/api/coin/?type=$type&id=$id&access_token=$tokenacc");
    return json_decode($nhan, true);
}
function follow($access_token, $idtest, $cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/'.$idtest.'/subscribers');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array('access_token' => $access_token);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access);
}
function share($access_token,$id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/me/feed?method=POST&link=https://www.facebook.com/'.$id.'&privacy={%27value%27:%20%27EVERYONE%27}&access_token='.$access_token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $headers = array();
    $headers[] = 'Authority: graph.facebook.com';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Sec-Fetch-Site: none';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}
function like($access_token, $id, $cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/'.$id.'/likes');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array('access_token' => $access_token);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access);

}
function cmt($access_token, $idcmt, $cookie, $msg) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/'.$idcmt.'/comments');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array('message' => $msg, 'access_token' => $access_token);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access);
}
function page($idpage, $cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/'.$idpage);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
	:'));
    $page = curl_exec($ch);
    if (explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0]) {
        $get = explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0];
        $link = 'https://mbasic.facebook.com/a/profile.php?fan&id='.$idpage.'&origin=page_profile&pageSuggestionsOnLiking=1&gfid='.$get.'&refid=17';
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
    }
    curl_close($ch);

}
function camxuc($idcx, $type, $cookie) {
    $ch = curl_init();
    if (strpos($idcx, '_')) {
        $uid = explode('_', $idcx, 2);
        $id2 = 'story.php?story_fbid='.$uid[1].'&id='.$uid[0];
    } else {
        $id2 = $idcx;
    }
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/'.$id2);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
	:'));
    $page = curl_exec($ch);
    if ($id2 != $idcx && explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0]) {
        $get = explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0];
    } else {
        $get = $id2;
    }
    $link = 'https://mbasic.facebook.com/reactions/picker/?is_permalink=1&ft_id='.$get;
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $cx = curl_exec($ch);
    $haha = explode('<a href="', $cx);
    if ($type == 'LOVE') {
        $haha2 = explode('" style="display:block"', $haha[2])[0];
    } else if ($type == 'WOW') {
        $haha2 = explode('" style="display:block"', $haha[5])[0];
    } else if ($type == 'HAHA') {
        $haha2 = explode('" style="display:block"', $haha[4])[0];
    } else if ($type == 'SAD') {
        $haha2 = explode('" style="display:block"', $haha[6])[0];
    } else {
        $haha2 = explode('" style="display:block"', $haha[7])[0];
    }
    $link2 = html_entity_decode($haha2);

    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com'.$link2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);
}
function hoanthanh($dem, $type, $id, $xujob, $xu) {
$a = "\e[10;657;50m\033[1;36m『$vang$dem \033[1;36m』 \033[1;31m● \033[1;32m【\033[1;33mTT2K8\033[1;32m 】 \033[1;31m● \033[1;35m".$tim.date("H:i")." \033[1;31m ● \033[1;32m$type \033[1;31m● \033[47m\033[1;30mĐã ẩn ID nhiệm vụ\033[0m \033[1;31m● \033[1;32m $xujob \033[1;31m● \033[1;37m".$xu." xu"."\033[1;90m\e[0m\n";
    
	$len = strlen($a);
    for ($x = 0; $x < $len; $x++) {
        echo $a[$x];
        usleep(1000);
    }
}
function delay($delay) {
 for ($x = $delay; $x > -1; $x--) {
        echo "                                \r";
        usleep( 100000 );
        echo "\033[1;31m   >TT2K8< └(・ˇ_ˇ・)~>                $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;31m   >TT2K8< └(・ˇ_ˇ・) ~>               $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;32m   >TT2K8< └(・ˇ_ˇ・)  ~>              $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;33m   >TT2K8< └(・ˇ_ˇ・)   ~>             $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;34m   >TT2K8< └(・ˇ_ˇ・)    ~>            $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;35m   >TT2K8< └(・ˇ_ˇ・)     ~>           $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;36m   >TT2K8< └(・ˇ_ˇ・)      ~>          $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;31m   >TT2K8< └(・ˇ_ˇ・)       ~>         $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;32m   >TT2K8< └(・ˇ_ˇ・)        ~>        $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;33m   >TT2K8< └(・ˇ_ˇ・)         ~>       $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;34m   >TT2K8< └(・ˇ_ˇ・)          ~>      $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;35m   >TT2K8< └(・ˇ_ˇ・)           ~>     $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;36m   >TT2K8< └(・ˇ_ˇ・)            ~>    $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;34m   >TT2K8< └(・ˇ_ˇ・)             ~>   $x GIÂY \r";
        usleep( 50000 );
        echo "\033[1;36m   >TT2K8< └(・ˇ_ˇ・)              ~>  $x GIÂY \r";
        usleep( 100000 );
        echo "\033[1;33m   >TT2K8< └(・ˇ_ˇ・)               ~> $x GIÂY \r";
        usleep( 50000 );
		echo "\033[1;32m   >TT2K8< └(・ˇ_ˇ・)                ~>$x GIÂY \r";}}
function laytoken($cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/composer/ocelot/async_loader/?publisher=feed');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $access = curl_exec($ch);
    curl_close($ch);
    if (explode('\",\"useLocalFilePreview', explode('accessToken\":\"', $access)[1])[0]) {
        $access_token = explode('\",\"useLocalFilePreview', explode('accessToken\":\"', $access)[1])[0];
    }
    return $access_token;
}
function joingr($id,$cookie){
  $ch = curl_init();
  $head_fb=array(
    "Host:mbasic.facebook.com",
    "cache-control:max-age=0",
    "upgrade-insecure-requests:1",
    "save-data:on",
    "user-agent:Mozilla/5.0 (Linux; Android 10; RMX1929) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Mobile Safari/537.36",
    "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    "sec-fetch-site:cross-site",
    "sec-fetch-mode:navigate",
    "sec-fetch-user:?1",
    "sec-fetch-dest:document",
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
    "cookie:".$cookie);
  curl_setopt_array ($ch, array (
  CURLOPT_URL => "https://mbasic.facebook.com/groups/$id?_rdr",
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_POST => 1,
  CURLOPT_HTTPGET => true,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTPHEADER => $head_fb,
  CURLOPT_HEADER => true,
  CURLOPT_ENCODING => TRUE));
  $data = curl_exec($ch);
 // var_dump($data);
  if (strpos($data,"xs=deleted") == true){
  echo ( $red."Cookie die rồi\n");
  }
  $tìm =explode("/a/group/join/?",$data);
  $tìm1=explode('"',$tìm[1]);
  $fb=explode('name="fb_dtsg" value="',$data);
  $fb=explode('"',$fb[1]);
  $fbdtsg=htmlspecialchars_decode($fb[0]);
  $jaz=explode('name="jazoest" value="',$data);
  $jaz=explode('"',$jaz[1]);
  $url="https://mbasic.facebook.com/a/group/join/?".htmlspecialchars_decode($tìm1[0]);
  $data="fb_dtsg=$fbdtsg&jazoest=".$jaz[0];
  curl_setopt_array ($ch, array (
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTPHEADER => $head_fb));
  $xxx = curl_exec($ch);
}

?>