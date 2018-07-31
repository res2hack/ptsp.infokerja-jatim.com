<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_sektor".
 *
 * @property string $id
 * @property string $nama
 * @property string $std_id
 * @property string $id_gen
 * @property string $kategori
 * @property string $levels
 */
class IpkSektor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_sektor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 255],
            [['std_id', 'id_gen'], 'string', 'max' => 8],
            [['kategori', 'levels'], 'string', 'max' => 4]
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
            'std_id' => 'Std ID',
            'id_gen' => 'Id Gen',
            'kategori' => 'Kategori',
            'levels' => 'Levels',
        ];
    }
}
