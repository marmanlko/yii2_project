<?php
namespace app\models;
use yii\db\ActiveRecord;
class todo extends ActiveRecord
{
	private $name;
	private $category_id;
	private $timestamp;
	public function rules()
	{
		return[
		[['name','category_id','timestamp'],'required']
	];
	}
} 
?>