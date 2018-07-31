<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pencaker_sip".
 *
 * @property integer $id
 * @property integer $pencaker_id
 * @property integer $sip_id
 * @property string $date_create
 * @property string $status
 */
class PencakerSip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pencaker_sip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pencaker_id', 'sip_id'], 'required'],
            [['pencaker_id', 'sip_id'], 'integer'],
            [['date_create'], 'safe'],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pencaker_id' => 'Pencaker ID',
            'sip_id' => 'Sip ID',
            'date_create' => 'Date Create',
            'status' => 'Status',
        ];
    }
}
