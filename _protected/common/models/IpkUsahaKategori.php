<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_usaha_kategori".
 *
 * @property integer $id
 * @property string $kode
 * @property string $nama
 */
class IpkUsahaKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_usaha_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'string', 'max' => 1],
            [['nama'], 'string', 'max' => 100]
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
            'nama' => 'Kategori Usaha',
        ];
    }
}
