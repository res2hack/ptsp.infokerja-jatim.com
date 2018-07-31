<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_direktori".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $kontak
 * @property string $detail
 * @property string $lat
 * @property string $lon
 * @property integer $sts_tampil
 * @property integer $sts_valid
 * @property string $kategori
 * @property integer $urutan
 */
class PciDirektori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_direktori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['detail'], 'string'],
            [['sts_tampil', 'sts_valid', 'urutan'], 'integer'],
            [['nama', 'alamat', 'kontak', 'lat', 'lon', 'kategori'], 'string', 'max' => 100],
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
            'alamat' => 'Alamat',
            'kontak' => 'Kontak',
            'detail' => 'Detail',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'sts_tampil' => 'Sts Tampil',
            'sts_valid' => 'Sts Valid',
            'kategori' => 'Kategori',
            'urutan' => 'Urutan',
        ];
    }
}
