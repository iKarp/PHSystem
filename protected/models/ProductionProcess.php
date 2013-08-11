<?php

/**
 * This is the model class for table "price_data".
 *
 * The followings are the available columns in table 'price_data':
 * @property integer $id
 * @property integer $is_folder
 * @property string $name
 * @property string $price
 * @property integer $parent_id
 * @property integer $is_active
 * @property string $indx
 * @property string $code
 * @property integer $comment_enabled
 * @property double $amortization
 * @property double $accruals_zp
 * @property double $oncost
 * @property double $tax
 * @property double $balance
 * @property double $purchase
 * @property double $efficiency
 * @property string $price_cost
 */
class ProductionProcess extends CActiveRecord
{

    public $cost = array();

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Process the static model class
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
		return 'price_data';
	}
    
    public function isGroup()
	{
		if ($this->is_folder == 1) return true; else return false;
	}
    
    public function calculate(){
        
        $this->cost = array(
            'materials' => 0,
            'operations' => 0,
            'fix' => 0,
        );
        
        foreach ($this->materials as $material) {
            $material->calculate();
            $this->cost['materials'] += $material->cost;
        }
        
        foreach ($this->operations as $operation) {
            $operation->calculate();
            $this->cost['operations'] += $operation->cost;
        }
        
        foreach ($this->subprocesses as $subprocess) {
            $subprocess->calculate();
            $this->cost['fix'] += $subprocess->cost;
        }
        
        $this->cost['overhead'] = $this->cost['materials'] * Yii::app()->params['overheadCost'] / 100;
        $this->cost['taxSalary'] = $this->cost['operations'] * Yii::app()->params['taxSalary'] / 100;
        $this->cost['var'] = $this->cost['operations'] + $this->cost['taxSalary'] + $this->cost['materials'] + $this->cost['overhead'];
        
    }
    
    public function calculateCount($count){
    
        $this->calculate();
        $this->cost['total'] = $this->cost['fix'] + $this->cost['var'] * $count;
    
    }
    
    public function calculateConsist(&$data){
        
        foreach ($this->materials as $material) {
            $material->calculate();
            if (isset($data['m'][$material->id]))
                $data['m'][$material->id] += $material->cost;
            else
                $data['m'][$material->id] = $material->cost;
        }
        
        foreach ($this->operations as $operation) {
            $operation->calculate();
            $this->cost['operations'] += $operation->cost;
        }
        
        foreach ($this->subprocesses as $subprocess) {
            $subprocess->calculate();
            $this->cost['fix'] += $subprocess->cost;
        }
        
        $this->cost['overhead'] = $this->cost['materials'] * Yii::app()->params['overheadCost'] / 100;
        $this->cost['taxSalary'] = $this->cost['operations'] * Yii::app()->params['taxSalary'] / 100;
        $this->cost['var'] = $this->cost['operations'] + $this->cost['taxSalary'] + $this->cost['materials'] + $this->cost['overhead'];
        
    }
    
    public function getPath(){
        $path = '';
        $parent_id = $this->parent_id;
        while ($parent_id > 0) {
            $model = ProductionProcess::model()->findByPk($parent_id);
            $path = $model->name.' <i class="icon-play" style="width: 20px"></i>'.$path;
            $parent_id = $model->parent_id;
        }
        $path = 'Корень <i class="icon-play" style="width: 20px"></i>'.$path;
        return $path;
    }
    
    public function breadcrumbs(){
        $breadcrumbs = array();
        $parent_id = $this->parent_id;
        $breadcrumbs[$this->name] = array('productionProcess/index&parent_id='.$this->id);
        while ($parent_id > 0) {
            $model = ProductionProcess::model()->findByPk($parent_id);
            $breadcrumbs[$model->name] = array('productionProcess/index&parent_id='.$parent_id);
            $parent_id = $model->parent_id;
        }
        $breadcrumbs['Начало'] = array('productionProcess/index');
        return array_reverse($breadcrumbs);
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_folder, name, parent_id', 'required'),
			array('is_folder, parent_id, is_active, comment_enabled', 'numerical', 'integerOnly'=>true),
			array('amortization, accruals_zp, oncost, tax, balance, purchase, efficiency', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('price, price_cost', 'length', 'max'=>10),
			array('indx', 'length', 'max'=>3),
			array('code', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, is_folder, name, price, parent_id, is_active, indx, code, comment_enabled, amortization, accruals_zp, oncost, tax, balance, purchase, efficiency, price_cost', 'safe', 'on'=>'search'),
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
            'materials' => array(self::HAS_MANY, 'ProductionProcessMaterial', array('price_id'=>'id')),
            'operations' => array(self::HAS_MANY, 'ProductionProcessOperation', array('price_id'=>'id')),
            'subprocesses' => array(self::HAS_MANY, 'ProductionProcessSubprocess', array('parent_price_id'=>'id')),
            'parent' => array(self::HAS_ONE, 'ProductionProcess', array('id'=>'parent_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'is_folder' => 'Is Folder',
			'name' => 'Название',
			'price' => 'Price',
			'parent_id' => 'Группа',
			'is_active' => 'Is Active',
			'indx' => 'Indx',
			'code' => 'Code',
			'comment_enabled' => 'Comment Enabled',
			'amortization' => 'Amortization',
			'accruals_zp' => 'Accruals Zp',
			'oncost' => 'Oncost',
			'tax' => 'Tax',
			'balance' => 'Balance',
			'purchase' => 'Purchase',
			'efficiency' => 'Efficiency',
			'price_cost' => 'Price Cost',
            'cost.materials' => 'Материалы',
            'cost.overhead' => 'Накладные расходы',
            'cost.operations' => 'ФОТ',
            'cost.taxSalary' => 'Налог с ФОТ',
            'cost.var' => 'Единица продукции',
            'cost.fix' => 'Соп. техпроцессы',
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
		$criteria->compare('is_folder',$this->is_folder);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('indx',$this->indx,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('comment_enabled',$this->comment_enabled);
		$criteria->compare('amortization',$this->amortization);
		$criteria->compare('accruals_zp',$this->accruals_zp);
		$criteria->compare('oncost',$this->oncost);
		$criteria->compare('tax',$this->tax);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('purchase',$this->purchase);
		$criteria->compare('efficiency',$this->efficiency);
		$criteria->compare('price_cost',$this->price_cost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}