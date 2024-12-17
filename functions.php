<?php

function check_login($conn)
{

if(isset($_SESSION['username']))
{

    $user = $_SESSION['username'];
    $query = "select * from users where username = '$user' limit 1";

    $result = mysqli_query($conn,$query);
    if($result && mysqli_num_rows($result) > 0)
    {

        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
}

header("Location: login.php");
die;

}

function totalWallets($conn, $user_id) {
    $query = "SELECT COUNT(*) AS count FROM wallets WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['count'];
}

function totalBalance($conn, $user_id) {
    $query = "SELECT SUM(balance) AS total FROM wallets WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    return $data['total'] ? $data['total'] : 0;
}

?>