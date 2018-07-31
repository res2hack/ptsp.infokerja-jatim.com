<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IpkJabatanKelompok;

/**
 * IpkJabatanKelompokSearch represents the model behind the search form about `common\models\IpkJabatanKelompok`.
 */
class IpkJabatanKelompokSearch extends IpkJabatanKelompok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kode', 'ipk_jabatan_pokok_id'], 'integer'],
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
        $query = IpkJabatanKelompok::find();

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
            'kode' => $this->kode,
            'ipk_jabatan_pokok_id' => $this->ipk_jabatan_pokok_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
