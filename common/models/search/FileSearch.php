<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\File;

/**
 * FileSearch represents the model behind the search form about `common\models\File`.
 */
class FileSearch extends File
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_published', 'created', 'updated', 'category_id'], 'integer'],
            [['title_ru', 'title_kz', 'title_en', 'file_ru', 'file_kz', 'file_en'], 'safe'],
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
        $query = File::find();

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
            'is_published' => $this->is_published,
            'created' => $this->created,
            'updated' => $this->updated,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_kz', $this->title_kz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'file_ru', $this->file_ru])
            ->andFilterWhere(['like', 'file_kz', $this->file_kz])
            ->andFilterWhere(['like', 'file_en', $this->file_en]);

        return $dataProvider;
    }
}
