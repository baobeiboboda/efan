<?php
namespace Home\Model\Main;

use Think\Model;

class NoticeModel extends Model
{
	public function insertNotice($value)
	{
		return $this->data($value)->add();
	}

	public function selectAllNotice()
	{
		return $this->order(array('id' => 'desc'))->field('id,title,important')->select();
	}

	public function selectNoticeById($id)
	{
		return $this->where(array('id' => $id))->find();
	}

	public function updateNoticeById($id,$value)
	{
		return $this->where(array('id' => $id))->data($value)->save();
	}

	public function deleteNoticeById($id)
	{
		return $this->where(array('id' => $id))->delete();
	}

	public function countNotice()
	{
		return $this->count();
	}

	public function selectNoticeForPage($nowPage,$perPage)
	{
		return $this->order(array('id' => 'desc'))->page($nowPage . ',' . $perPage)->select();
	}
}