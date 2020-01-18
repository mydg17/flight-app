<?php
Flight::route( 'POST /users/add', function(){
	$db = Flight::db();
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$data = array(
		'username' => $user,
		'password' => md5($pass)
	);

	$id = $db->insert('users',$data);
	if($id)
		Flight::redirect('/users');
	else
		echo 'insert failed'.$db->getLastError();
});

Flight::route('GET /users/add',function(){
	Flight::view()->set('title','Users');
	Flight::render('add');
});

Flight::route('GET /user/edit/@username', function($username){
	Flight::view()->set('title','Users');
	Flight::render('edit');
	echo "coba $username";
});

Flight::route( 'GET /users(/page/@page:[0-9]+)', function($page){
	Flight::view()->set('title', 'Users');

	if ( empty($page) ){
		$page = 1;
	}

	$db = Flight::db();
	$db->pageLimit = 10; // set limit per page

	$users = $db->arraybuilder()->paginate('users', $page);
    Flight::render( 'users', array(
    	'users' => $users,
    	'page' => $page,
    	'total_pages' => $db->totalPages
    ) );
    if(!EMPTY($_GET['us'])){
    $userku = $_GET['us'];
    $db->where('username',$userku);
	if($db->delete('users'));
	Flight::redirect('/users');
	}
});
