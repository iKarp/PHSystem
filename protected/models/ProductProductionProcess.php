<?php

/**
 * This is the model class for table "price_product_calculation".
 *
 * The followings are the available columns in table 'price_product_calculation':
 * @property string $id
 * @property string $product_id
 * @property string $calculation_id
 * @property string $fcost
 * @property string $vcost
 */
class ProductProductionProcess extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductProductionProcess the static model class
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
		return 'price_product_calculation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, calculation_id', 'required'),
			array('product_id, calculation_id', 'length', 'max'=>11),
			array('fcost, vcost', 'length', 'max'=>14),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, calculation_id, fcost, vcost', 'safe', 'on'=>'search'),
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
            'product' => array(self::HAS_ONE, 'Product', array('product_id'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'calculation_id' => 'Технологический процесс',
			'fcost' => 'Fcost',
			'vcost' => 'Vcost',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('calculation_id',$this->calculation_id,true);
		$criteria->compare('fcost',$this->fcost,true);
		$criteria->compare('vcost',$this->vcost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}