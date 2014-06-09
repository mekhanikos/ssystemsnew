<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $id
 * @property integer $subproduct_id
 * @property string $color
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $lang
 * @property integer $main
 *
 * The followings are the available model relations:
 * @property Features[] $features
 * @property Categories[] $categories
 * @property SubProducts $subproduct
 */
class Items extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'items';
	}

    public function init()
    {
        $this->lang = Yii::app()->language;
        $this->image=0;
    }


    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
        return array(
        array('name, subproduct_id', 'required'),
        array('subproduct_id, main', 'numerical', 'integerOnly'=>true),
        array('name', 'length', 'max'=>250),
        array('color, image', 'length', 'max'=>255),
        array('lang', 'length', 'max'=>10),
        array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
        array('id, name, description, subproduct_id, color, image, lang', 'safe', 'on'=>'search'),
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
			'features' => array(self::HAS_MANY, 'Features', 'item_id'),
            'categories' => array(self::MANY_MANY, 'Categories', 'item_categries(item_id, cat_id)'),
			'subproduct' => array(self::BELONGS_TO, 'SubProducts', 'subproduct_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'name' => 'Item Name',
            'description' => 'Description',
			'subproduct_id' => 'Subproduct',
			'color' => 'Color',
			'image' => 'Image',
			'lang' => 'Lang',
            'main' => 'Main',
		);
	}


    /**
     * This is invoked after the record is saved.
     */

    /**
     * This is invoked after the record is saved.
     */
    protected function afterSave()
    {
        parent::afterSave();

    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('subproduct_id',$this->subproduct_id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('lang',$this->lang,true);
        $criteria->compare('main',$this->main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Items the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
