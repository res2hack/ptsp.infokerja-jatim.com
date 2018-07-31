<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IpkPendidikan;

/**
 * IpkPendidikanSearch represents the model behind the search form about `common\models\IpkPendidikan`.
 */
class IpkPendidikanSearch extends IpkPendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis', 'tingkat', 'jurusan', 'pencaker_id', 'jenispddk_id'], 'integer'],
            [['nama', 'tahun_masuk', 'tahun_lulus', 'nilai'], 'safe'],
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
        $query = IpkPendidikan::find();

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
            'jenis' => $this->jenis,
            'tingkat' => $this->tingkat,
            'jurusan' => $this->jurusan,
            'tahun_masuk' => $this->tahun_masuk,
            'tahun_lulus' => $this->tahun_lulus,
            'pencaker_id' => $this->pencaker_id,
            'jenispddk_id' => $this->jenispddk_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nilai', $this->nilai]);

        return $dataProvider;
    }
}
