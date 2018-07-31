<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_jenispddk".
 *
 * @property string $id
 * @property string $nama
 * @property integer $kode
 * @property integer $kode_parent
 * @property string $levels
 * @property integer $kategori
 */
class IpkJenispddk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_jenispddk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kode_parent', 'kategori'], 'integer'],
            [['nama'], 'string', 'max' => 64],
            [['levels'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Pendidikan',
            'kode' => 'Kode',
            'kode_parent' => 'Kode Parent',
            'levels' => 'Levels',
            'kategori' => 'Kategori',
        ];
    }
}
