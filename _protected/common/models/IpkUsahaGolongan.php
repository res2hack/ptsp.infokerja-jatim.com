<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_usaha_golongan".
 *
 * @property integer $id
 * @property string $kode
 * @property string $nama
 * @property string $ipk_usaha_kategori_id
 */
class IpkUsahaGolongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_usaha_golongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 100],
            [['ipk_usaha_kategori_id'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'ipk_usaha_kategori_id' => 'Ipk Usaha Kategori ID',
        ];
    }
}
