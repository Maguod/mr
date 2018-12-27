<?php

namespace App;
use Aura\SqlQuery\QueryFactory;
use Database;
use PDO;

class QueryBilder {
  protected $pdo;
  protected $queryFactory;
  
  public function __construct()
  {
    $pdo = new Database\Connection;
    $this->pdo=$pdo->make();
    $this->queryFactory = new QueryFactory('mysql');
  }
  
  public function getAll($table)
  {
  
  
    $select = $this->queryFactory->newSelect();
    $select->cols(['*'])
      ->from($table);

    $sth = $this->pdo->prepare($select->getStatement());


    $sth->execute($select->getBindValues());


    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

  //функция заносим данные в базу
  public function createInsert($table, $data)
  {
    $insert = $this->queryFactory->newInsert();
  
    $insert
      ->into($table)                   // INTO this table
      ->cols($data);
    $sth = $this->pdo->prepare($insert->getStatement());

    $sth->execute($insert->getBindValues());

  }
  
    public function update($table, $data, $id) {
  
      $update = $this->queryFactory->newUpdate();
  
      $update
        ->table($table)                  // update this table
        ->cols($data)

        ->where('id = :id')           // AND WHERE these conditions
        ->bindValue('id', $id);
  
      // prepare the statement
      $sth = $this->pdo->prepare($update->getStatement());

      // execute with bound values
      $sth->execute($update->getBindValues());

  }
  
  /**
   * find one
   * @return result
   */
  public function getOne($table, $id)
  {
    $select = $this->queryFactory->newSelect();
  
    $select->cols(['*'])
    ->from($table)
    ->where('id = :id')
    ->bindValue('id', $id);
  
    $sth = $this->pdo->prepare($select->getStatement());

    $sth->execute($select->getBindValues());

    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
    
  }

  public function delete( $table,  $id)
  {
    $delete = $this->queryFactory->newDelete();
    $delete
      ->from($table)                   // FROM this table
      ->where('id = :id')           // AND WHERE these conditions
      ->bindValue('id', $id);   // bind one value to a placeholder
  
    $sth = $this->pdo->prepare($delete->getStatement());
    
    // execute with bound values
    $sth->execute($delete->getBindValues());

  }

}