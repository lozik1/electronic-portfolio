<?php

include 'db.php';

$sur_name = $_POST['sur_name'];
$name = $_POST['name'];
$second_name = $_POST['second_name'];



$get_id = $_GET['id'];

// Create
if (isset($_POST['add'])) {
	$sql = ("INSERT INTO teacher_name(sur_name, name , second_name) VALUES(?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$sur_name, $name, $second_name]);
	if ($query) {
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}
}

//READ
$sql = $pdo->prepare("SELECT * FROM `teacher_name`");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);


//Update
if (isset($_POST['edit'])) {
	$sql = ("UPDATE teacher_name SET sur_name =? , name = ? , second_name = ? WHERE id=?");
	$query = $pdo->prepare($sql);
	$query->execute([$sur_name, $name, $second_name , $get_id]);
	if ($query) {
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}
}

//Delete
if (isset($_POST['delete'])) {
	$sql = "DELETE FROM teacher_name WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	if ($query) {
	header('Location: '. $_SERVER['HTTP_REFERER']);
	}
}
//create criteria
if (isset($_POST['add_criteria'])) {
    $sql = "INSERT INTO criteria (criterion1, criterion2, criterion3, criterion4, criterion5, criterion6, criterion7, criterion8, criterion9, criterion10, criterion11, criterion12, criterion13, criterion14, criterion15, criterion16, criterion17, criterion18, criterion19, criterion20, criterion21, criterion22, criterion23, criterion24, criterion25, criterion26, criterion27, criterion28, criterion29, criterion30, criterion31, criterion32, criterion33) 
    VALUES (:criterion1, :criterion2, :criterion3, :criterion4, :criterion5, :criterion6, :criterion7, :criterion8, :criterion9, :criterion10, :criterion11, :criterion12, :criterion13, :criterion14, :criterion15, :criterion16, :criterion17, :criterion18, :criterion19, :criterion20, :criterion21, :criterion22, :criterion23, :criterion24, :criterion25, :criterion26, :criterion27, :criterion28, :criterion29, :criterion30, :criterion31, :criterion32, :criterion33)";
    $query = $pdo->prepare($sql);
    $values = [];
    for ($i = 1; $i <= 33; $i++) {
        $value = isset($_POST['criterion'.$i]) ? (int)$_POST['criterion'.$i] : 0;
        $values[":criterion$i"] = $value;
    }
    
    if ($query->execute($values)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Ошибка при выполнении запроса: " . $query->errorInfo()[2];
    }
}
