<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_kategori".
 *
 * @property integer $id
 * @property string $kategori
 * @property string $keterangan
 * @property integer $urutan
 * @property integer $kategori_id
 *
 * @property PciKategori $kategori0
 * @property PciKategori[] $pciKategoris
 * @property PciKonsultasi[] $pciKonsultasis
 * @property PciPosting[] $pciPostings
 * @property PciPosting[] $pciPostings0
 * @property PciPostingTag[] $pciPostingTags
 */
class PciKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori'], 'required'],
            [['keterangan'], 'string'],
            [['urutan', 'kategori_id'], 'integer'],
            [['kategori'], 'string', 'max' => 100],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciKategori::className(), 'targetAttribute' => ['kategori_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'keterangan' => 'Keterangan',
            'urutan' => 'Urutan',
            'kategori_id' => 'Kategori ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori0()
    {
        return $this->hasOne(PciKategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciKategoris()
    {
        return $this->hasMany(PciKategori::className(), ['kategori_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciKonsultasis()
    {
        return $this->hasMany(PciKonsultasi::className(), ['kategori_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciPostings()
    {
        return $this->hasMany(PciPosting::className(), ['kategori_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciPostings0()
    {
        return $this->hasMany(PciPosting::className(), ['bahasa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciPostingTags()
    {
        return $this->hasMany(PciPostingTag::className(), ['kategori_id' => 'id']);
    }
}
