<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PciDirektori;

/**
 * PciDirektoriSearch represents the model behind the search form about `common\models\PciDirektori`.
 */
class PciDirektoriSearch extends PciDirektori
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sts_tampil', 'sts_valid', 'urutan'], 'integer'],
            [['nama', 'alamat', 'kontak', 'detail', 'lat', 'lon', 'kategori'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PciDirektori::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
				$query->orderBy('id desc');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sts_tampil' => $this->sts_tampil,
            'sts_valid' => $this->sts_valid,
            'urutan' => $this->urutan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kontak', $this->kontak])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lon', $this->lon])
            ->andFilterWhere(['in', 'kategori', $this->kategori]);

        return $dataProvider;
    }
}
