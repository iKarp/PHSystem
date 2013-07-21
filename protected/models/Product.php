<?php

/**
 * This is the model class for table "price_products".
 *
 * The followings are the available columns in table 'price_products':
 * @property string $id
 * @property string $parent_id
 * @property string $is_folder
 * @property string $is_active
 * @property string $name
 * @property string $count
 * @property string $price
 * @property string $profit
 * @property integer $fix_cost
 * @property string $fcost
 * @property string $vcost
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
    public $cost;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'price_products';
	}
    
    public function isGroup()
	{
		if ($this->is_folder == 1) return true; else return false;
	}
    
    public function isProduct()
	{
		if ($this->is_semiproduct == 0 && $this->is_folder == 0) return true; else false;
	}
    
    public function isSemiproduct()
	{
		if ($this->is_semiproduct == 1 && $this->is_folder == 0) return true; else false;
	}
    
    public function calculate(){
        
        $this->cost = array(
            'var' => 0,
            'fix' => 0,
        );
        
        foreach ($this->processes as $item) {
            if ($this->isProduct()) {
                $item->process->calculateCount($this->count * $item->count);
                $this->cost['var'] += $item->count * $item->process->cost['var'];
            }
            else {
                $item->process->calculate();
                $this->cost['var'] += $item->process->cost['var'];
            }
            
            $this->cost['fix'] += $item->process->cost['fix'];
        }
        
        if ($this->isProduct()) foreach ($this->semiproducts as $item) {
            $item->semiproduct->calculateCount($this->count * $item->count);
            $this->cost['var'] += $item->count * $item->semiproduct->cost['var'];
            $this->cost['fix'] += $item->semiproduct->cost['fix'];
        }
        
        if ($this->isSemiproduct()) $this->cost['fix'] += $this->cost['var'] * $this->count;
        
    }
    
    public function calculateCount($count){
    
        $this->calculate();
        $this->cost['total'] = $this->cost['fix'] + $this->cost['var'] * $count;
    
    }

    public function breadcrumbs(){
        $breadcrumbs = array();
        $parent_id = $this->parent_id;
        $breadcrumbs[$this->name] = array('product/index&parent_id='.$this->id);
        while ($parent_id > 0) {
            $model = Product::model()->findByPk($parent_id);
            $breadcrumbs[$model->name] = array('product/index&parent_id='.$parent_id);
            $parent_id = $model->parent_id;
        }
        $breadcrumbs['Начало'] = array('product/index');
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
			array('fix_cost', 'numerical', 'integerOnly'=>true),
			array('parent_id, count', 'length', 'max'=>11),
			array('is_folder, is_active, is_semiproduct', 'length', 'max'=>1),
			array('name', 'length', 'max'=>255),
			array('price, profit, fcost, vcost', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, is_folder, is_active, name, count, price, profit, fix_cost, fcost, vcost', 'safe', 'on'=>'search'),
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
            'processes' => array(self::HAS_MANY, 'ProductProductionProcess', array('product_id'=>'id')),
            'semiproducts' => array(self::HAS_MANY, 'ProductSemiproduct', array('product_id'=>'id')),
            'parent' => array(self::HAS_ONE, 'Product', array('id'=>'parent_id')),
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
			'is_semiproduct' => 'Is Semiproduct',
			'is_active' => 'Is Active',
			'name' => 'Название',
			'count' => 'Плановый тираж',
			'price' => 'Плановая цена',
			'profit' => 'Плановая наценка',
			'fix_cost' => 'Fix Cost',
			'cost.fix' => 'Цена техпроцессов',
			'cost.var' => 'Цена штуки',
            'cost.total' => 'Текущая себест-ть',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('is_folder',$this->is_folder,true);
		$criteria->compare('is_active',$this->is_active,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('count',$this->count,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('profit',$this->profit,true);
		$criteria->compare('fix_cost',$this->fix_cost);
		$criteria->compare('fcost',$this->fcost,true);
		$criteria->compare('vcost',$this->vcost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}