<?php

/**
 * This is the model class for table "ord_status_changes".
 *
 * The followings are the available columns in table 'ord_status_changes':
 * @property integer $id
 * @property integer $order_id
 * @property integer $old_status_id
 * @property integer $new_status_id
 * @property string $created
 * @property string $moved
 * @property string $manager_id
 * @property string $comment
 */
class OrderHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ord_status_changes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, new_status_id, created', 'required'),
			array('order_id, old_status_id, new_status_id', 'numerical', 'integerOnly'=>true),
			array('manager_id', 'length', 'max'=>4),
			array('comment', 'length', 'max'=>512),
			array('moved', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, old_status_id, new_status_id, created, moved, manager_id, comment', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'status' => array(self::HAS_ONE, 'DataList', array('code'=>'new_status_id'), 'on'=>"`type`='orderStatus'"),
            'user' => array(self::HAS_ONE, 'User', array('user_id'=>'manager_id'), 'with'=>'person'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'old_status_id' => 'Old Status',
			'new_status_id' => 'New Status',
			'created' => 'Дата',
			'moved' => 'Moved',
			'manager_id' => 'Manager',
			'comment' => 'Комментарий',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('old_status_id',$this->old_status_id);
		$criteria->compare('new_status_id',$this->new_status_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('moved',$this->moved,true);
		$criteria->compare('manager_id',$this->manager_id,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}