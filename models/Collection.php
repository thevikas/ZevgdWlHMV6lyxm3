<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "collection".
 *
 * @property int $id_county
 * @property double $amount
 * @property double $taxrate
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_county', 'amount', 'taxrate'], 'required'],
            [['id_county'], 'integer'],
            [['amount', 'taxrate'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_county' => 'Id County',
            'amount' => 'Amount',
            'taxrate' => 'Taxrate',
        ];
    }
}
