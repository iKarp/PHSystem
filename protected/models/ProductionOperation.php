<?php

/**
 * This is the model class for table "production_works_hours".
 *
 * The followings are the available columns in table 'production_works_hours':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $is_folder
 * @property integer $is_active
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $hours
 * @property integer $measurement_id
 */
class ProductionOperation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductionOperation the static model class
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
		return 'production_works_hours';
	}
    
    public function isGroup()
	{
		if ($this->is_folder == 1) return true; else return false;
	}
    

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag', 'required'),
			array('parent_id, is_folder, is_active, measurement_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('tag', 'length', 'max'=>100),
			array('hours', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, is_folder, is_active, name, description, tag, hours, measurement_id', 'safe', 'on'=>'search'),
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
            'measurement' => array(self::HAS_ONE, 'ProductionOperationMeasurement', array('id'=>'measurement_id')),
            'parent' => array(self::HAS_ONE, 'ProductionOperation', array('id'=>'parent_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'is_folder' => 'Is Folder',
			'is_active' => 'Is Active',
			'name' => 'Name',
			'description' => 'Description',
			'tag' => 'Tag',
			'hours' => 'Hours',
			'measurement_id' => 'Measurement',
		);
	}

	public function breadcrumbs(){
        $breadcrumbs = array();
        $parent_id = $this->parent_id;
        $breadcrumbs[$this->name] = array('productionOperation/index&parent_id='.$this->id);
        while ($parent_id > 0) {
            $model = ProductionOperation::model()->findByPk($parent_id);
            $breadcrumbs[$model->name] = array('productionOperation/index&parent_id='.$parent_id);
            $parent_id = $model->parent_id;
        }
        $breadcrumbs['Начало'] = array('productionOperation/index');
        return array_reverse($breadcrumbs);
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('is_folder',$this->is_folder);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('measurement_id',$this->measurement_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}