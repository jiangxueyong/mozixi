<?php
use Hook\Db\{OrmConnect};

class ConfigModel extends Base\AbstractModel
{
    public $fields = [
        'key' => array('type' => parent::NOTHING, 'require' => true, 'validate' => 'isGenericName'),
        'value' => array('require' => true),
    ];

    public function get(): array
    {
        return OrmConnect::getInstance($this->table)->select(['id', 'status', 'date_add', 'date_upd', 'key', 'value'])->fetchAll();
    }

    public function getDefined(): array
    {
        return OrmConnect::getInstance($this->table)->select(['key', 'value'])->where(['status' => 1])->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}