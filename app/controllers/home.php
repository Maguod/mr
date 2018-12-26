<?php
$info = include '../Database/InfoDatabase.php';
use App\QueryBilder;

$connectDb = new \Database\Connection();

$qb = new QueryBilder($connectDb->make($info['Database']));


$posts = $qb->getAll('posts');

$templates = new League\Plates\Engine('../app/view/');
//var_dump($templates); die;

// Render a template
echo $templates->render('homeview', ['posts' => $posts]);