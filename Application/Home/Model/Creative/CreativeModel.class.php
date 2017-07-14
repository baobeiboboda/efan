<?php
namespace Home\Model\Creative;

use Think\Model;

class CreativeModel extends Model
{

	public function selectAllCreative()
	{
		return $this->getField('id,uid,creativetitle,group,state,pdfurl');
	}

	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function insertCreative($value)
	{
		return $this->data($value)->add();
	}

	/**
	 * { function_description }
	 *
	 * @param      <type>  $id     The identifier
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function findCreativeById($id)
	{
		return $this->where(array('id' => $id))->find();
	}

	public function selectAllAdminCreative()
	{
		return $this->getField('id,uid,creativetitle,group,state,zentaostate,pdfurl');	
	}

	public function updateCreative($id,$creativetitle,$group,$creative)
	{
		return $this->where(array('id' => $id))->data(array('creativetitle' => $creativetitle, 'group' => $group, 'creative' => $creative))->save();
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