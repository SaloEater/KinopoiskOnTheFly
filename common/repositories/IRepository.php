<?php

namespace common\repositories;

use yii\db\ActiveRecord;

class IRepository
{
    /**
     * @param ActiveRecord $record
     * @param array $condition
     * @return ActiveRecord|null
     */
    protected function findBy(ActiveRecord $record, array $condition)
    {
        $object = $record::find()->where($condition)->limit(1)->one();
        return $object;
    }

    /**
     * @param ActiveRecord $record
     * @param array $condition
     * @return ActiveRecord
     * @throws NotFoundException
     */
    protected function getBy(ActiveRecord $record, array $condition)
    {
        if (!($object = $this->findBy($record, $condition))) {
            throw new NotFoundException($record::className());
        }
        return $object;
    }

    /**
     * @param ActiveRecord $record
     * @param array $condition
     * @return array|null
     */
    protected function findAll(ActiveRecord $record, array $condition)
    {
        $objects = $record::find()->where($condition)->all();
        return $objects;
    }

    /**
     * @param ActiveRecord $record
     * @param array $condition
     * @return array
     * @throws NotFoundException
     */
    protected function getAll(ActiveRecord $record, array $condition)
    {
        if (!($objects = $this->findAll($record, $condition))) {
            throw new NotFoundException($record::className());
        }
        return $objects;
    }
}