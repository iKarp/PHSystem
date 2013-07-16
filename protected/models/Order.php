<?php

/**
 * This is the model class for table "ord_orders".
 *
 * The followings are the available columns in table 'ord_orders':
 * @property integer $id
 * @property integer $num
 * @property integer $status_id
 * @property string $cdate
 * @property integer $organization_id
 * @property integer $performer_id
 * @property string $took
 * @property string $manager_id
 * @property integer $production_num
 * @property string $production_fio
 * @property string $design
 * @property string $specification
 * @property string $bill_num
 * @property double $sum
 * @property string $deadline
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /*protected function afterConstruct()
    {
        Yii::trace("Its order afterConstruct", 'dev.order.construct');
        $this->number = DataList::item('performer',$this->performer_id)."-".$this->num;
        return parent::afterConstruct();
    }*/

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ord_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization_id, performer_id', 'required'),
			array('num, status_id, organization_id, performer_id, production_num', 'numerical', 'integerOnly'=>true),
			array('sum', 'numerical'),
			array('took, production_fio', 'length', 'max'=>150),
			array('manager_id', 'length', 'max'=>11),
			array('bill_num', 'length', 'max'=>50),
			array('design, specification, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, status_id, cdate, organization_id, performer_id, took, manager_id, production_num, production_fio, design, specification, bill_num, sum, deadline', 'safe', 'on'=>'search'),
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
            'customer' => array(self::BELONGS_TO, 'Customer', 'organization_id'),
            'history' => array(self::HAS_MANY, 'OrderHistory', array('order_id'=>'id')),
            'performer' => array(self::HAS_ONE, 'DataList', array('code'=>'performer_id'), 'on'=>"`type`='performer'"),
            'products' => array(self::HAS_MANY, 'OrderProduct', array('order_id'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'num' => 'Num',
			'status_id' => 'Status',
			'cdate' => 'Создан',
			'organization_id' => 'Заказчик',
			'performer_id' => 'Исполнитель',
			'took' => 'Менеджер',
			'manager_id' => 'Manager',
			'production_num' => 'Production Num',
			'production_fio' => 'Production Fio',
			'design' => 'Design',
			'specification' => 'Комментарий',
			'bill_num' => 'Bill Num',
			'sum' => 'Стоимость',
			'deadline' => 'Срок изготовления',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('num',$this->num);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('performer_id',$this->performer_id);
		$criteria->compare('took',$this->took,true);
		$criteria->compare('manager_id',$this->manager_id,true);
		$criteria->compare('production_num',$this->production_num);
		$criteria->compare('production_fio',$this->production_fio,true);
		$criteria->compare('design',$this->design,true);
		$criteria->compare('specification',$this->specification,true);
		$criteria->compare('bill_num',$this->bill_num,true);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('deadline',$this->deadline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public static function loadOrders($status)
    {
        return new CActiveDataProvider('Order',array(
            'criteria'=>array(
                'condition'=>'status_id=:status',
                'params'=>array(':status'=>$status),
                'order'=>'cdate DESC',
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));
    }
    
    public function listPerformer()
	{
		$dataProvider=new CActiveDataProvider('Performer');
        $list = array();
        $data = $dataProvider->getData();
        foreach ($data as $item){
            $list[$item->id] = $item->name;
        }
        return $list;
	}
    
    protected function beforeSave()
    {
        Yii::trace("Its before Save", 'dev.order.save');
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                //%
                $maxNum = Yii::app()->db->createCommand()->select('max(num)+1')->from($this->tableName())->where('performer_id=:id', array(':id'=>$this->getAttribute('performer_id')))->queryScalar();
                Yii::trace("Order number: ".$maxNum, 'dev.order.save');
                $this->setAttributes(array('num'=>$maxNum,'status_id'=>1));
            }
            return true;
        }
        else
            return false;
    }
    
}