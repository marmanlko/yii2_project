<?php
namespace app\models;
use yii\db\ActiveRecord;
class category extends ActiveRecord
{
	private $id;
	private $name;
	public function rules()
	{
		return[
		[['id','name'],'required']
	];
	}
} 
?>