<?php

/**
 * @property int $id
 * @property string $full_name
 * @property int $groups_id
 * @property string $bithday
 */
class Students extends Model
{
    use TModel;

    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    protected string $table = 'students';

    public function findOne(): array
    {
        return $this->dsh->query("SELECT * FROM $this->table LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll(): array
    {
        return $this->dsh->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_ASSOC);
    }
}
