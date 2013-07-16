<?php

/**
 * This is the model class for table "main_organizations".
 *
 * The followings are the available columns in table 'main_organizations':
 * @property integer $id_organization
 * @property string $name_organization
 * @property string $adress_uri
 * @property string $adress_fact
 * @property string $telephone
 * @property integer $ogrn
 * @property integer $rashet_account
 * @property string $bank_name
 * @property integer $bank_kor_account
 * @property integer $bank_bik
 * @property integer $persons_id
 * @property string $inn
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 'main_organizations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_organization', 'required'),
			array('ogrn, rashet_account, bank_kor_account, bank_bik, persons_id', 'numerical', 'integerOnly'=>true),
			array('name_organization, adress_uri, adress_fact, telephone, bank_name', 'length', 'max'=>255),
			array('inn', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_organization, name_organization, adress_uri, adress_fact, telephone, ogrn, rashet_account, bank_name, bank_kor_account, bank_bik, persons_id, inn', 'safe', 'on'=>'search'),
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
			'id_organization' => 'Id Organization',
			'name_organization' => 'Заказчик',
			'adress_uri' => 'Adress Uri',
			'adress_fact' => 'Adress Fact',
			'telephone' => 'Telephone',
			'ogrn' => 'Ogrn',
			'rashet_account' => 'Rashet Account',
			'bank_name' => 'Bank Name',
			'bank_kor_account' => 'Bank Kor Account',
			'bank_bik' => 'Bank Bik',
			'persons_id' => 'Persons',
			'inn' => 'Inn',
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

		$criteria->compare('id_organization',$this->id_organization);
		$criteria->compare('name_organization',$this->name_organization,true);
		$criteria->compare('adress_uri',$this->adress_uri,true);
		$criteria->compare('adress_fact',$this->adress_fact,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('ogrn',$this->ogrn);
		$criteria->compare('rashet_account',$this->rashet_account);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_kor_account',$this->bank_kor_account);
		$criteria->compare('bank_bik',$this->bank_bik);
		$criteria->compare('persons_id',$this->persons_id);
		$criteria->compare('inn',$this->inn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}