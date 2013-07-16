<?php

/**
 * This is the model class for table "price_per_material".
 *
 * The followings are the available columns in table 'price_per_material':
 * @property string $relation_id
 * @property integer $price_id
 * @property integer $material_id
 * @property string $material_count
 */
class ProductionProcessMaterial extends CActiveRecord
{

    public $cost = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductionProcessMaterial the static model class
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
		return 'price_per_material';
	}
    
    public function calculate(){
        $this->cost = $this->material->price * $this->material_count;
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price_id, material_id', 'numerical', 'integerOnly'=>true),
			array('material_count', 'length', 'max'=>10),
            array('material_count', 'numerical', 'integerOnly'=>false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('relation_id, price_id, material_id, material_count', 'safe', 'on'=>'search'),
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
            'material' => array(self::HAS_ONE, 'Material', array('id'=>'material_id')),
            'process' => array(self::HAS_ONE, 'ProductionProcess', array('id'=>'price_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relation_id' => 'Relation',
			'price_id' => 'Технологический процесс',
			'material_id' => 'Материал',
			'material_count' => 'Количество',
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

		$criteria->compare('relation_id',$this->relation_id,true);
		$criteria->compare('price_id',$this->price_id);
		$criteria->compare('material_id',$this->material_id);
		$criteria->compare('material_count',$this->material_count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}