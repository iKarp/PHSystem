<?php

/**
 * This is the model class for table "core_persons".
 *
 * The followings are the available columns in table 'core_persons':
 * @property integer $person_id
 * @property string $fname
 * @property string $mname
 * @property string $sname
 * @property string $birthday
 * @property string $birth_place
 * @property integer $address_id
 * @property integer $sex
 * @property string $pension_number
 * @property string $card_number
 * @property string $current_passport_id
 * @property string $current_passport_ser_number
 * @property integer $current_address_id
 * @property string $current_oms_polis_id
 * @property string $current_oms_polis_ser_number
 * @property string $parent_id
 */
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
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
		return 'core_persons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, mname, sname, birthday, birth_place, address_id, sex, pension_number, card_number, current_passport_ser_number, current_address_id, current_oms_polis_ser_number', 'required'),
			array('address_id, sex, current_address_id', 'numerical', 'integerOnly'=>true),
			array('fname, mname, sname, current_passport_ser_number, current_oms_polis_ser_number', 'length', 'max'=>50),
			array('birth_place', 'length', 'max'=>200),
			array('pension_number', 'length', 'max'=>14),
			array('card_number, current_passport_id, current_oms_polis_id, parent_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('person_id, fname, mname, sname, birthday, birth_place, address_id, sex, pension_number, card_number, current_passport_id, current_passport_ser_number, current_address_id, current_oms_polis_id, current_oms_polis_ser_number, parent_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'person_id' => 'Person',
			'fname' => 'Fname',
			'mname' => 'Mname',
			'sname' => 'Sname',
			'birthday' => 'Birthday',
			'birth_place' => 'Birth Place',
			'address_id' => 'Address',
			'sex' => 'Sex',
			'pension_number' => 'Pension Number',
			'card_number' => 'Card Number',
			'current_passport_id' => 'Current Passport',
			'current_passport_ser_number' => 'Current Passport Ser Number',
			'current_address_id' => 'Current Address',
			'current_oms_polis_id' => 'Current Oms Polis',
			'current_oms_polis_ser_number' => 'Current Oms Polis Ser Number',
			'parent_id' => 'Parent',
		);
	}

    public function fio()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return $this->fname." ".$this->mname." ".$this->sname;
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

		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('mname',$this->mname,true);
		$criteria->compare('sname',$this->sname,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('pension_number',$this->pension_number,true);
		$criteria->compare('card_number',$this->card_number,true);
		$criteria->compare('current_passport_id',$this->current_passport_id,true);
		$criteria->compare('current_passport_ser_number',$this->current_passport_ser_number,true);
		$criteria->compare('current_address_id',$this->current_address_id);
		$criteria->compare('current_oms_polis_id',$this->current_oms_polis_id,true);
		$criteria->compare('current_oms_polis_ser_number',$this->current_oms_polis_ser_number,true);
		$criteria->compare('parent_id',$this->parent_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}