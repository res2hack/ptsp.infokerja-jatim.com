<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_kecamatan".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_gen
 * @property string $kabupaten_id
 */
class IpkKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gen', 'kabupaten_id'], 'integer'],
            [['nama'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_gen' => 'Id Gen',
            'kabupaten_id' => 'Kabupaten ID',
        ];
    }
}
