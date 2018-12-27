<?php
$info = include '../Database/InfoDatabase.php';
use App\QueryBilder;
use \Tamtamchik\SimpleFlash\Flash;

$connectDb = new \Database\Connection();
//flash()->message('Hello Flash');
//echo flash()->display();

$qb = new QueryBilder($connectDb->make($info['Database']));


$posts = $qb->getAll('posts');

$templates = new League\Plates\Engine('../app/view/');

function baseHome() {

}
// Render a template
echo $templates->render('homeview', ['posts' => $posts]);