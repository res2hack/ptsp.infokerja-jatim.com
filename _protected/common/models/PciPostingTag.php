<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_posting_tag".
 *
 * @property integer $id
 * @property integer $kategori_id
 * @property integer $posting_id
 * @property string $waktu_post
 *
 * @property PciPosting $posting
 * @property PciKategori $kategori
 */
class PciPostingTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_posting_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kategori_id', 'posting_id'], 'required'],
            [['id', 'kategori_id', 'posting_id'], 'integer'],
            [['waktu_post'], 'safe'],
            [['posting_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciPosting::className(), 'targetAttribute' => ['posting_id' => 'id']],
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
            'kategori_id' => 'Kategori ID',
            'posting_id' => 'Posting ID',
            'waktu_post' => 'Waktu Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosting()
    {
        return $this->hasOne(PciPosting::className(), ['id' => 'posting_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(PciKategori::className(), ['id' => 'kategori_id']);
    }
}
