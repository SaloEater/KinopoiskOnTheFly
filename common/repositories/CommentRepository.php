<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:48
 */

namespace common\repositories;


use common\essences\Comment;

class CommentRepository extends IRepository
{
    private $innerRecord;

    public function __construct(Comment $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    /**
     * @param int $table_id
     * @param int $page_id
     * @param int|null $parent_id
     * @return array|null
     */
    public function findByPageAndParent(int $table_id, int $page_id, $parent_id)
    {
        $comments = $this->_findAll($this->innerRecord, [
           'table_id' => $table_id,
           'page_id' =>  $page_id,
            'parent_id' => $parent_id
        ]);

        return $comments;
    }
}