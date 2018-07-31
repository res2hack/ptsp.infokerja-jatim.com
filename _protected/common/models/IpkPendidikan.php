<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_pendidikan".
 *
 * @property string $id
 * @property integer $jenis
 * @property integer $tingkat
 * @property integer $jurusan
 * @property integer $jurusan_txt
 * @property string $nama
 * @property string $tahun_masuk
 * @property string $tahun_lulus
 * @property string $nilai
 * @property integer $pencaker_id
 * @property integer $jenispddk_id
 */
class IpkPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis', 'tingkat', 'jurusan', 'pencaker_id', 'jenispddk_id'], 'integer'],
            [['tahun_masuk', 'tahun_lulus'], 'safe'],
            // [[ 'jenispddk_id'], 'required'],
            [['nama','jurusan_txt'], 'string', 'max' => 64],
            [['nilai'], 'number', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis' => 'Jenis',
            'tingkat' => 'Tingkat',
            'jurusan' => 'Jurusan',
            'nama' => 'Nama Institusi Pendidikan',
            'tahun_masuk' => 'Tahun Masuk',
            'tahun_lulus' => 'Tahun Lulus',
            'nilai' => 'Nilai',
            'pencaker_id' => 'Pencaker ID',
            'jenispddk_id' => 'Jenispddk ID',
            'jurusan_txt' => 'Jurusan',
        ];
    }
    public function getTingkatPendidikan()
    {
        return $this->hasOne(IpkJenispddk::className(), ['kode' => 'tingkat']);
    }
    public function getJenisPendidikan()
    {
        return $this->hasOne(IpkJenispddk::className(), ['kode' => 'jenis']);
    }
    public function getJenisJurusan()
    {
        return $this->hasOne(IpkJenispddk::className(), ['kode' => 'jurusan']);
    }
}
