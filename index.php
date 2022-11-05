<?php
	require 'vendor/autoload.php';

	$app = new Slim\App();

	$app->get('/',function ($request,$response,$args) {
    	$response->write("Hola mundo!");
    	return $response;
	});

	$app->get("/hola/{nombre}",function($request, $response, $args){
    	$response->write("hola, ". $args["nombre"]);
    	return $response;
	});

	$app->post("/pruebapost",function($request, $response, $args){
    	$reqPost = $request->getParsedBody();
    	$val1 = $reqPost["val1"];
    	$val2 = $reqPost["val2"];
    	$response->write("Valores: ". $val1 . " ". $val2);
    	return $response;
	});

	$app->get("/testjson", function( $request, $response, $args ){
    	$data[0]["nombre"]="Kebyn Cristopher";
    	$data[0]["apellidos"]="Martínez Vásquez";
    	$data[1]["nombre"]="Monica";
    	$data[1]["apellidos"]="Portillo Sánchez";
    	$response->write(json_encode($data, JSON_PRETTY_PRINT));
    	return $response;
	});

	$app->put("/updatePassword/{user}&{pass}&{newPass}",function($request, $response, $args){
    	$user = $args["user"];
    	$pass = $args["pass"];
    	$newPass = $args["newPass"];
    	$response->write( json_encode(updatePassword($user, $pass, $newPass),JSON_PRETTY_PRINT));
    	return $response;
	});

	$app->delete("/deleteProd/{user}&{pass}&{isbn}",function($request, $response, $args){
    	$user = $args["user"];
    	$pass = $args["pass"];
    	$isbn = $args["isbn"];
    	$response->write( json_encode(deleteProd($user, $pass, $isbn),JSON_PRETTY_PRINT));
    	return $response;
	});

	$app->run();
?>