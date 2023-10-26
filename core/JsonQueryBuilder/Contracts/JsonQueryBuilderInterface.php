<?php

namespace Core\JsonQueryBuilder\Contracts;

interface JsonQueryBuilderInterface {

    public function __construct($filepath);

    public function select($fields);

    public function from($table);

    public function where($field, $operator, $value);

    public function find($field, $value);

    public function limit($limit);

    public function orderBy($fields, $direction = 'ASC');

    public function get();

    public function count();

    public function exists();

    public function first();
    /*
    @param mixed $data
    @return mixed
    */
    public function applyQuery($data);

}