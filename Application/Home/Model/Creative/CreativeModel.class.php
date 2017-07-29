<?php
namespace Home\Model\Creative;

use Think\Model;

class CreativeModel extends Model
{

	public function selectAllCreative()
	{
		return $this->getField('id,uid,creativetitle,group,state,pdfurl');
	}

	public function insertCreative($value)
	{
		return $this->data($value)->add();
	}

	public function findCreativeById($id)
	{
		return $this->where(array('id' => $id))->find();
	}

	public function selectAllAdminCreative()
	{
		return $this->getField('id,uid,creativetitle,group,state,zentaostate,pdfurl');	
	}

	public function updateCreative($id,$value)
	{
		return $this->where(array('id' => $id))->data($value)->save();
	}

	public function setStateOpenByIds($id)
	{
		return $this->where(array('id' => array('in',$id)))->data(array('state' => '1'))->save();
	}

	public function setStateCloseByIds($id)
	{
		return $this->where(array('id' => array('in',$id)))->data(array('state' => '0'))->save();
	}

	public function deleteCreativeByIds($id)
	{
		return $this->where(array('id' => array('in',$id)))->delete();
	}

}