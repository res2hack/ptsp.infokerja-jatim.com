<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PencakerSip;

/**
 * PencakerSipSearch represents the model behind the search form about `common\models\PencakerSip`.
 */
class PencakerSipSearch extends PencakerSip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pencaker_id', 'sip_id'], 'integer'],
            [['date_create', 'status'], 'safe'],
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
        $query = PencakerSip::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pencaker_id' => $this->pencaker_id,
            'sip_id' => $this->sip_id,
            'date_create' => $this->date_create,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
