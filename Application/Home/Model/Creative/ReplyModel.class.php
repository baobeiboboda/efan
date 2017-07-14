<?php
namespace Home\Model\Creative;

use Think\Model;

class ReplyModel extends Model
{
	public function insertReply($value)
	{
		return $this->data($value)->add();
	}

	public function selectFatherReplyByCidForPage($cid,$nowPage,$perPage)
	{
		return $this->where(array('cid' => $cid))->page($nowPage . ',' . $perPage)->select();
	}

	public function countFatherReplyByCid($cid)
	{
		return $this->where(array('cid' => $cid))->count();
	}

	public function selectSonDiscussByPid($pid)
	{
		return $this->where(array('pid' => $pid))->select();
	}
}