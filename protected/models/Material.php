<?php

/**
 * This is the model class for table "production_materials".
 *
 * The followings are the available columns in table 'production_materials':
 * @property string $id
 * @property integer $parent_id
 * @property integer $is_folder
 * @property integer $is_active
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $price
 * @property integer $measurement_id
 */
class Material extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Material the static model class
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
		return 'production_materials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price', 'required'),
			array('parent_id, is_folder, is_active, measurement_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('tag', 'length', 'max'=>100),
			array('price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, is_folder, is_active, name, description, tag, price, measurement_id', 'safe', 'on'=>'search'),
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
            'measurement' => array(self::HAS_ONE, 'DataList', array('code'=>'measurement_id'), 'on'=>"`type`='measurement'"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Группа',
			'is_folder' => 'Is Folder',
			'is_active' => 'Is Active',
			'name' => 'Материал',
			'description' => 'Description',
			'tag' => 'Tag',
			'price' => 'Price',
			'measurement_id' => 'Единица измерения',
		);
	}
    
    public function breadcrumbs(){
        $breadcrumbs = array();
        $parent_id = $this->parent_id;
        $breadcrumbs[$this->name] = array('material/index&parent_id='.$parent_id);
        while ($parent_id > 0) {
            $model = Material::model()->findByPk($parent_id);
            $breadcrumbs[$model->name] = array('material/index&parent_id='.$parent_id);
            $parent_id = $model->parent_id;
        }
        $breadcrumbs['Начало'] = array('material/index');
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('is_folder',$this->is_folder);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('measurement_id',$this->measurement_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}