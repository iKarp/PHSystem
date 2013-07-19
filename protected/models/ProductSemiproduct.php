<?php

/**
 * This is the model class for table "price_product_semiproducts".
 *
 * The followings are the available columns in table 'price_product_semiproducts':
 * @property string $id
 * @property string $product_id
 * @property string $parent_id
 * @property string $count
 * @property string $label
 */
class ProductSemiproduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductSemiproduct the static model class
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
		return 'price_product_semiproducts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, semiproduct_id', 'required'),
			array('product_id, semiproduct_id', 'length', 'max'=>11),
			array('count', 'length', 'max'=>14),
			array('label', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, semiproduct_id, count, label', 'safe', 'on'=>'search'),
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
            'product' => array(self::BELONGS_TO, 'Product', array('product_id'=>'id')),
            'semiproduct' => array(self::HAS_ONE, 'Product', array('id'=>'semiproduct_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'semiproduct_id' => 'Полуфабрикат',
			'product_id' => 'Продукт',
			'count' => 'Количество',
			'label' => 'Компонент',
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
		$criteria->compare('semiproduct_id',$this->parent_id,true);
		$criteria->compare('count',$this->count,true);
		$criteria->compare('label',$this->label,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}