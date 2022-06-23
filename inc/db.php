<?php


require_once($_SERVER['DOCUMENT_ROOT']."/scienceArticles/vendor/autoload.php");
 use Laudis\Neo4j\Authentication\Authenticate;
 use Laudis\Neo4j\ClientBuilder;
 use Laudis\Neo4j\Contracts\TransactionInterface;

    try{
    $auth = Authenticate::basic('neo4j', '123456');
    $client = ClientBuilder::create()
                ->withDriver('neo4j', 'neo4j://localhost:7687',  $auth)
                ->build();
       // echo("connect");
     }catch(PDOException $e){
       // echo("no connect");
     }
     try{
      $auth = Authenticate::basic('neo4j', '123456');
      $client2 = ClientBuilder::create()
                  ->withDriver('neo4j', 'neo4j://localhost:7687',  $auth)
                  ->build();
         // echo("connect");
       }catch(PDOException $e){
         // echo("no connect");
       }     
       try{
        $auth = Authenticate::basic('neo4j', '123456');
        $client1 = ClientBuilder::create()
                    ->withDriver('neo4j', 'neo4j://localhost:7687',  $auth)
                    ->build();
           // echo("connect");
         }catch(PDOException $e){
           // echo("no connect");
         }




?>