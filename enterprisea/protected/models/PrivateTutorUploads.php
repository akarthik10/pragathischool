<?php

/**
 * This is the model class for table "center_uploads".
 *
 * The followings are the available columns in table 'center_uploads':
 * @property integer $id
 * @property integer $center_id
 * @property string $title
 * @property string $file
 * @property string $file_type
 * @property string $created_at
 */
class PrivateTutorUploads extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CenterUploads the static model class
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
		return 'center_uploads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('center_id, title, file, file_type, created_at', 'required'),
			array('center_id', 'numerical', 'integerOnly'=>true),
			array('title, file_type', 'length', 'max'=>120),

			array('file', 'file', 'types'=>'jpg, jpeg, png, gif, pdf, mp4, doc, txt, ppt, docx', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, center_id, title, file, file_type, created_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'center_id' => 'Center',
			'title' => 'Title',
			'file' => 'File',
			'file_type' => 'File Type',
			'created_at' => 'Created At',
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
		$criteria->compare('center_id',$this->center_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('file_type',$this->file_type,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}