<?php
include_once ROOT.'/models/books.php';
class BooksController{
	
public function actionIndex(){
	
	//echo 'actionIndex';
	
	$arr=Books::getBooksList();
	require_once(ROOT.'/views/books/index.php');
	return TRUE;
	}
public function actionView($category, $id){
	
	$arrOne=Books::getBooksItemById($id);
	require_once(ROOT.'/views/books/view.php');
	return TRUE;
	}
}