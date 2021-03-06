<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IpkKabupaten;

/**
 * IpkKabupatenSearch represents the model behind the search form about `common\models\IpkKabupaten`.
 */
class IpkKabupatenSearch extends IpkKabupaten
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_gen', 'kategori', 'provinsi_id'], 'integer'],
            [['nama'], 'safe'],
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
        $query = IpkKabupaten::find()->orderBy('id desc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_gen' => $this->id_gen,
            'kategori' => $this->kategori,
            'provinsi_id' => $this->provinsi_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
