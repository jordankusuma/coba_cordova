<?php

require_once "connect.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_karyawan()
{
    global $conn;
    $query = $conn->query("SELECT * from karyawan");

    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }

    $response = array(
        'status' => 1,
        'message' => 'Success',
        'data' => $data
    );

    header('Content-Type: application/json');
    echo json_encode($response);
}

function get_karyawan_id()
{
    global $conn;

    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }

    $query = $conn->query("SELECT * from karyawan where id=$id");

    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }

    if ($data) {
        $response = array(
            'status' => 1,
            'message' => 'Success',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'No Data Found'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_karyawan()
{
    global $conn;
    $check = array('id' => '', 'nama' => '', 'kelamin' => '', 'alamat' => '');
    $check_match = count(array_intersect_key($_POST, $check));

    if ($check_match == count($check)) {
        $result = mysqli_query($conn, "INSERT INTO karyawan SET 
            id='$_POST[id]', 
            nama = '$_POST[nama]', 
            kelamin = '$_POST[kelamin]', 
            alamat = '$_POST[alamat]'");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Insert Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Insert Failed'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Wrong Parameter'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function update_karyawan()
{
    global $conn;

    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }

    $check = array('nama' => '', 'kelamin' => '', 'alamat' => '');
    $check_match = count(array_intersect_key($_POST, $check));

    if ($check_match == count($check)) {
        $result = mysqli_query($conn, "UPDATE karyawan SET  
            nama = '$_POST[nama]', 
            kelamin = '$_POST[kelamin]', 
            alamat = '$_POST[alamat]'
            where id=$id");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Update Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Update Failed'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Wrong Parameter',
            'data' => $id
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete_karyawan()
{
    global $conn;
    $id = $_GET['id'];
    $query = "DELETE FROM karyawan WHERE id=" . $id;
    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Delete Success'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Delete Failed'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
