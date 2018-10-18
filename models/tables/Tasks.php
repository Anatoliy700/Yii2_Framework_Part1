<?php

namespace app\models\tables;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property int $user_id
 * @property string $fullUsername
 *
 * @property Users $user
 */
class Tasks extends ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName() {
    return 'tasks';
  }
  
  /**
   * {@inheritdoc}
   */
  public function rules() {
    return [
      [['title', 'description', 'date'], 'required'],
      [['user_id'], 'integer'],
      [['date'], 'safe'],
      [['title'], 'string', 'max' => 50],
      [['description'], 'string', 'max' => 255],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
      [['fullUsername'], 'safe']
    ];
  }
  
  /**
   * {@inheritdoc}
   */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'title' => 'Title',
      'description' => 'Description',
      'date' => 'Date',
      'user_id' => 'User ID',
      'fullUsername' => 'Username'
    ];
  }
  
  public function fields() {
    return ['id', 'title', 'description', 'date'];
  }
  
  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUser() {
    return $this->hasOne(Users::class, ['id' => 'user_id']);
  }
  
  public function getFullUsername() {
    return $this->user->first_name . ' ' . $this->user->last_name;
  }
}
