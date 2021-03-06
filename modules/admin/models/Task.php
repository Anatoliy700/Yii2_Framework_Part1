<?php

namespace app\modules\admin\models;

use app\models\tables\Tasks;
use Yii;
use yii\base\Model;

class Task extends Tasks
{
    public $id;
    public $date;
    public $title;
    public $description;
    public $user_id;
    static protected $taskDbClass = '\app\models\tables\Tasks';
    
    public function rules() {
        return [
            //[['id'], 'integer', 'min' => 1],
            [['title', 'description', 'user_id'], 'required'],
            ['date', 'date', 'format' => 'php:Y-m-d', 'min' => date('Y-m-d'), 'minString' => 'текущей'],
            ['title', 'string', 'length' => [5, 10]],
            //['title', 'app\components\validators\TaskStringValidator', 'length' => [5, 20], 'startWord' => 'Сделать'],
            ['description', 'string', 'min' => 5]
        ];
    }
    
    
    public function save($runValidation = true, $attributeNames = null) {
        if ($this->validate()) {
            if ($this->date == '') {
                $this->date = date('Y-m-d');
            }
        }
        $model = new Tasks();
        $model->setAttributes($this->attributes);
        if ($model->save()) {
            $this->id = $model->getPrimaryKey();
            return true;
        }
        return false;
    }
}