<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property integer $perusahaan_id
 * @property string $tgl_booking
 * @property integer $jumlah
 * @property string $tgl_pesan
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perusahaan_id', 'jumlah'], 'integer'],
            [['tgl_booking', 'tgl_pesan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perusahaan_id' => 'Perusahaan ID',
            'tgl_booking' => 'Tgl Booking',
            'jumlah' => 'Jumlah',
            'tgl_pesan' => 'Tgl Pesan',
        ];
    }
}
