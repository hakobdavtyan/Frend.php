<?php


interface ModelInterface
{
    public function all($table);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id, $table);

    public function find(array $data, $table, array $selected);
}