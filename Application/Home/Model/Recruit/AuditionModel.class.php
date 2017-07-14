<?php
namespace Home\Model\Recruit;

use Think\Model;

class AuditionModel extends Model
{
	public function findAuditionList()
	{
		return $this->select();
	}
}