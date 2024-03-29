<?php

namespace app\models;

use Yii;
use app\models\State;
/**
 * This is the model class for table "county".
 *
 * @property int $id_county
 * @property string $name
 * @property int $id_state
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'county';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_state'], 'required'],
            [['id_state'], 'integer'],
            [['taxrate'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_county' => 'Id County',
            'name' => 'Name',
            'id_state' => 'Id State',
            'totalcoll' => 'Total Tax Collection',
            'taxrate' => 'Tax Rate %',
        ];
    }

    public function getState()
    {
        return $this->hasOne(State::className(), ['id_state' => 'id_state']);
    }

    public function getTotalColl()
    {
        return Collection::find()->where(['id_county' => $this->id_county])->sum('amount');
    }
}
