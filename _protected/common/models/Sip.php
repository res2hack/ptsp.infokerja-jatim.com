<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sip".
 *
 * @property integer $id
 * @property string $no_sip
 * @property integer $perusahaan_id
 * @property integer $sts_formal
 * @property string $agency
 * @property integer $jabatan_id
 * @property integer $negara_tujuan
 * @property string $tgl_ijin_awal
 * @property string $tgl_ijin_akhir
 * @property integer $jumlah_l
 * @property integer $jumlah_p
 * @property integer $jumlah_lp
 * @property string $tgl_input
 * @property string $tgl_update
 * @property integer $sts_brosur
 * @property string $ket
 *
 * @property NegaraTujuan $negaraTujuan
 * @property Jabatan $jabatan
 * @property Perusahaan $perusahaan
 */
class Sip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perusahaan_id', 'sts_formal', 'jabatan_id', 'negara_tujuan', 'jumlah_l', 'jumlah_p', 'jumlah_lp', 'sts_brosur'], 'integer'],
            [['jabatan_id'], 'required'],
            [['tgl_ijin_awal', 'tgl_ijin_akhir', 'tgl_input', 'tgl_update'], 'safe'],
            [['ket'], 'string'],
            [['no_sip', 'agency'], 'string', 'max' => 100],
            [['negara_tujuan'], 'exist', 'skipOnError' => true, 'targetClass' => NegaraTujuan::className(), 'targetAttribute' => ['negara_tujuan' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['perusahaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['perusahaan_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_sip' => 'No Sip',
            'perusahaan_id' => 'Perusahaan ID',
            'sts_formal' => 'Sts Formal',
            'agency' => 'Agency',
            'jabatan_id' => 'Jabatan ID',
            'negara_tujuan' => 'Negara Tujuan',
            'tgl_ijin_awal' => 'Tgl Ijin Awal',
            'tgl_ijin_akhir' => 'Tgl Ijin Akhir',
            'jumlah_l' => 'Jumlah L',
            'jumlah_p' => 'Jumlah P',
            'jumlah_lp' => 'Jumlah Lp',
            'tgl_input' => 'Tgl Input',
            'tgl_update' => 'Tgl Update',
            'sts_brosur' => 'Sts Brosur',
            'ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegaraTujuan()
    {
        return $this->hasOne(NegaraTujuan::className(), ['id' => 'negara_tujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['id' => 'perusahaan_id']);
    }
}
