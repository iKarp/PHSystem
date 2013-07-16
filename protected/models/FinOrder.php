<?php

/**
 * This is the model class for table "main_finance_documents".
 *
 * The followings are the available columns in table 'main_finance_documents':
 * @property string $id
 * @property integer $data_id
 * @property string $value
 * @property string $agent_str
 * @property string $comment
 * @property string $cdate
 * @property integer $doc_type
 * @property integer $agent_id
 * @property string $face_id
 * @property string $type_id
 * @property string $number_1c
 */
class FinOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FinOrder the static model class
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
		return 'main_finance_documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_id, cdate', 'required'),
			array('data_id, doc_type, agent_id', 'numerical', 'integerOnly'=>true),
			array('value', 'length', 'max'=>12),
			array('agent_str, comment', 'length', 'max'=>255),
			array('face_id, type_id', 'length', 'max'=>11),
			array('number_1c', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data_id, value, agent_str, comment, cdate, doc_type, agent_id, face_id, type_id, number_1c', 'safe', 'on'=>'search'),
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
            'customer' => array(self::HAS_ONE, 'Customer', array('id_organization'=>'agent_id')),
            'face' => array(self::HAS_ONE, 'DataList', array('code'=>'face_id'), 'on'=>"`type`='face'"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data_id' => 'Data',
			'value' => 'Value',
			'agent_str' => 'Agent Str',
			'comment' => 'Comment',
			'cdate' => 'Cdate',
			'doc_type' => 'Doc Type',
			'agent_id' => 'Agent',
			'face_id' => 'Face',
			'type_id' => 'Type',
			'number_1c' => 'Number 1c',
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

		$criteria->compare('data_id',$this->data_id);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('doc_type',$this->doc_type);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('face_id',$this->face_id,true);
		$criteria->compare('type_id',$this->type_id,true);
		
        $criteria->order ='cdate DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>20,),
		));
	}
}