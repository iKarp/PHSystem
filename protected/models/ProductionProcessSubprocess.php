<?php

/**
 * This is the model class for table "price_per_price".
 *
 * The followings are the available columns in table 'price_per_price':
 * @property integer $relation_id
 * @property integer $parent_price_id
 * @property integer $price_id
 * @property integer $price_count
 */
class ProductionProcessSubprocess extends CActiveRecord
{

    public $cost = 0;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductionProcessSubprocess the static model class
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
		return 'price_per_price';
	}

    public function calculate(){
        $this->process->calculate();
        $this->cost = $this->price_count * $this->process->cost['var'] + $this->process->cost['fix'];
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_price_id, price_id, price_count', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('relation_id, parent_price_id, price_id, price_count', 'safe', 'on'=>'search'),
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
            'process' => array(self::HAS_ONE, 'ProductionProcess', array('id'=>'price_id')),
            'parent' => array(self::BELONGS_TO, 'ProductionProcess', array('parent_price_id'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relation_id' => 'Relation',
			'parent_price_id' => 'Технологичекий',
			'price_id' => 'Сопутствующий технологический процесс',
			'price_count' => 'Количество',
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

		$criteria->compare('relation_id',$this->relation_id);
		$criteria->compare('parent_price_id',$this->parent_price_id);
		$criteria->compare('price_id',$this->price_id);
		$criteria->compare('price_count',$this->price_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}