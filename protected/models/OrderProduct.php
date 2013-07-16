<?php

/**
 * This is the model class for table "ord_orders_per_production".
 *
 * The followings are the available columns in table 'ord_orders_per_production':
 * @property integer $id
 * @property integer $product_id
 * @property integer $order_id
 * @property integer $count
 * @property string $vcost
 * @property string $fcost
 * @property string $cost
 * @property string $profit
 */
class OrderProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderProduct the static model class
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
		return 'ord_orders_per_production';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, order_id, vcost, fcost, cost, profit, count', 'required'),
			array('product_id, order_id, count', 'numerical', 'integerOnly'=>true),
			array('vcost, fcost, cost, profit', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, order_id, count, vcost, fcost, cost, profit', 'safe', 'on'=>'search'),
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
            'product' => array(self::HAS_ONE, 'Product', array('id'=>'product_id')),
            'order' => array(self::HAS_ONE, 'Order', array('id'=>'order_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Продукт',
			'order_id' => 'Order',
			'count' => 'Тираж, шт',
			'vcost' => 'Vcost',
			'fcost' => 'Fcost',
			'cost' => 'Цена, руб',
			'profit' => 'Наценка, %',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('count',$this->count);
		$criteria->compare('vcost',$this->vcost,true);
		$criteria->compare('fcost',$this->fcost,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('profit',$this->profit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}