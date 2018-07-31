<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "konfigurasi".
 *
 * @property integer $id
 * @property integer $kuota_booking
 */
class Konfigurasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konfigurasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kuota_booking'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kuota_booking' => 'Kuota Booking',
        ];
    }
}
