<?php
namespace Home\Controller\Daily;

use Home\Controller\HomeController;
use Home\Model\Daily\DailyModel;
use Home\Model\Daily\OtherModel;
use Home\Model\User\UserModel;

class DailyadminController extends HomeController
{
	/**
	 * 查询所有人的日报列表
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function index()
	{
		$dailyModel = new DailyModel;
		$dailyLists = $dailyModel->selectAllDaily();
		$userModel = new UserModel;
		foreach ($dailyLists as &$dailyList) {
			$dailyList['time'] = date('Y-m-d',$dailyList['time']);
			$name = $userModel->findNameByUid($dailyList['uid']);
			$dailyList['name'] = $name['name'];
			$dailyList['uid'] = uidWithYF($dailyList['uid']);
		}
		$this->assign('allDaily', $dailyLists);
		$this->display();
	}

	public function look()
	{
		$id = I('get.id');
		$id = urlsafe_b64decode($id);
		$id = authcode($id,'DECODE');
		if(empty($id)){
			return $this->error('非法操作，请退回上一页面重新进入');
		}
		$dailyModel = new DailyModel;
		$daily = $dailyModel->findDailyById($id);
		$daily['time'] = date('Y-m-d H:i:s',$daily['time']);
		$userModel = new UserModel;
		$name = $userModel->findNameByUid($daily['uid']);
		$daily['name'] = $name['name'];
		$daily['uid'] = uidWithYF($daily['uid']);
		$this->assign('daily',$daily);
		$this->display();
	}

	public function make()
	{
		$userModel = new UserModel;
		$uidLists = $userModel->getAllUidEnable();
		foreach ($uidLists as $uidList) {
			$result = $this->makeDaily($uidList['uid']);
		}
		$zip = new \ZipArchive();
        if ($zip->open('./Dailyzip/'.date("Y-m-d").'.zip', \ZipArchive::OVERWRITE) === TRUE) {
	        $this->addFileToZip("./Dailyfinal/" . date("Y-m-d") , $zip);  //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
	        $zip->close(); //关闭处理的zip文件
        }
        $lastMondayStart = strtotime("last Sunday") - 518400;
        $lastMonday = date('Ymd', $lastMondayStart);
        $lastSundayEnd = strtotime("last Sunday");
        $lastSunday = date('Ymd', $lastSundayEnd);
        $title = '周报' . $lastMonday . '-' . $lastSunday;
        $result = sendMailWithAtt( '13804165128@163.com' , $title , $title , './Dailyzip/'.date("Y-m-d").'.zip');
		return $this->success('周报已经成功生成，并发送邮箱成功');
	}

	protected function addFileToZip($path, $zip) {
        $handler = opendir($path); //打开当前文件夹由$path指定。
        /*
        循环的读取文件夹下的所有文件和文件夹
        其中$filename = readdir($handler)是每次循环的时候将读取的文件名赋值给$filename，
        为了不陷于死循环，所以还要让$filename !== false。
        一定要用!==，因为如果某个文件名如果叫'0'，或者某些被系统认为是代表false，用!=就会停止循环
        */
        while (($filename = readdir($handler)) !== false) {
        if ($filename != "." && $filename != "..") {//文件夹文件名字为'.'和‘..’，不要对他们进行操作
        if (is_dir($path . "/" . $filename)) {// 如果读取的某个对象是文件夹，则递归
        $this->addFileToZip($path . "/" . $filename, $zip);
        } else { //将文件加入zip对象
        $zip->addFile($path . "/" . $filename);
        }
        }
        }
        @closedir($path);
    }

	function makeDaily($uid)
	{
		// 获取上周周一0点的时间戳
		$lastMondayStart = strtotime("last Sunday") - 518400;
		// 获取上周周日24点的时间戳
		$lastSundayEnd = strtotime("last Sunday") + 86400;
		// 查询本周是否写过日报
		$dailyModel = new DailyModel;
		$personOneWeekDailyNumber = $dailyModel->countOneWeekDailyByUidStartEndTime($uid,$lastMondayStart,$lastSundayEnd);
		if($personOneWeekDailyNumber != 0){
			/* 写过日报开始走流程 */
			// 查询姓名
			$userModel = new UserModel;
			$name = $userModel->findNameByUid($uid);
			$name = $name['name'];
			// 日报上显示的日期
			$startTime = date("Y年m月d日",$lastMondayStart);
			$endTime = date("Y年m月d日",$lastSundayEnd-1);
			// 查询补充材料中的信息
			$otherModel = new OtherModel;
			$otherDailys = $otherModel->findDailyByUidAndStartTime($uid,$lastMondayStart,$lastSundayEnd);
			if(empty($otherDailys)){
				$keynote = '空';
				$summary = '空';
				$plan = '空';
				$idea = '空';
			}else{
				foreach ($otherDailys as $otherDaily) {
					$keynote = $otherDaily['keynote'];
					$summary = $otherDaily['summary'];
					$plan = $otherDaily['plan'];
					$idea = $otherDaily['idea'];
				}
			}
			$word="<h1 align=\"center\">工作周报</h1>
    		<p />
		    <p>时　间：".$startTime."至".$endTime."</p>
		    <p>姓　名：".$name."</p>
		    <p />
		    <p>一、工作重点：</p>
		    <p>　　".$keynote."</p>
		    <p />
		    <p>二、具体内容： </p>";
		    $timeListStart = $lastMondayStart;
		    $timeListEnd = $timeListStart+86400;
		    for ($i=0; $i < 7 ; $i++) { 
		    	$info = date("m月d日：" ,$timeListStart);
		    	$infos = $dailyModel->selectOneWeekDailyByUidStartEndTime($uid,$timeListStart,$timeListEnd);
		    	if(empty($infos)){
		    		$info = "<p>".$info."空</p>";
		    	}else{
		    		$info = "<p>".$info.$infos['info']."</p>";
		    	}
		    	$word = $word.$info;
		    	$timeListStart = $timeListStart + 86400;
		    	$timeListEnd = $timeListEnd + 86400;
		    }
		    $word = $word."<p />
		    <p>三、本周工作总结 </p>
		    <p>　　".$summary."</p> 
		    <p />
		    <p>四、下周工作安排 </p>
		    <p>　　".$plan."</p>
		    <p />  
		    <p>五、创意</p>
		    <p>　　".$idea."</p>";
		    $result = $this->cword($word,iconv("UTF-8","GB2312//IGNORE",$name));
		    $result="success".$result;
		    return $result;
		}
	}

	function cword($data,$fileName='')
	{
		if(empty($data)) return '';
		$data='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">'.$data.'</html>';
		$dir = "./Dailyfinal/".date("Y-m-d")."/";
		if(!file_exists($dir)) mkdir($dir,0777,true);
		if(empty($fileName)) {
		$fileName=$dir.date('His').'.doc';
		}else{
		$fileName =$dir.$fileName.'.doc';
		}
		$writefile=fopen($fileName,'wb') or die("创建文件失败");//wb以二进制写入
		fwrite($writefile,$data);
		fclose($writefile);
		return $fileName;
	}
}