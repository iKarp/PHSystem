<?php

/**
 * This is the model class for table "price_per_works".
 *
 * The followings are the available columns in table 'price_per_works':
 * @property integer $relation_id
 * @property integer $price_id
 * @property integer $work_id
 * @property double $work_count
 */
class ProductionProcessOperation extends CActiveRecord
{

    public $cost = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductionProcessOperation the static model class
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
		return 'price_per_works';
	}

    public function calculate(){
        $this->cost = $this->work_count * $this->operation->measurement->cost / $this->operation->productivity;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price_id, work_id', 'numerical', 'integerOnly'=>true),
			array('work_count', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('relation_id, price_id, work_id, work_count', 'safe', 'on'=>'search'),
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
            'operation' => array(self::HAS_ONE, 'ProductionOperation', array('id'=>'work_id')),
            'process' => array(self::BELONGS_TO, 'ProductionProcess', array('price_id'=>'id')),
            //'process' => array(self::HAS_ONE, 'ProductionProcess', array('id'=>'price_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relation_id' => 'Relation',
			'price_id' => 'Price',
			'work_id' => 'Операция',
			'work_count' => 'Количество',
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
		$criteria->compare('price_id',$this->price_id);
		$criteria->compare('work_id',$this->work_id);
		$criteria->compare('work_count',$this->work_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}