<?php
<?php
session_start();

// LOGIN PROCESS
if(isset($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    // demo user
    if($login == "student" && $password == "12345"){
        $_SESSION['user'] = $login;
        header("Location: index.php");
        exit;
    } else {
        $error = "Login yoki parol xato!";
    }
}

// LOGOUT
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>magistr.cspu.uz</title>

<style>
body {
    margin:0;
    font-family:"Segoe UI";
    background:#f4f6f9;
}

/* LOGIN */
.login-container {
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.login-box {
    width:350px;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.login-box input {
    width:100%;
    padding:12px;
    margin:10px 0;
}

.login-box button {
    width:100%;
    padding:12px;
    background:#2f4b7c;
    color:white;
    border:none;
}

/* HEADER */
.header {
    height:60px;
    background:#2f4b7c;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 20px;
}

/* SIDEBAR */
.sidebar {
    width:240px;
    height:100vh;
    background:#1e3a5f;
    color:white;
    position:fixed;
    top:60px;
}

.sidebar li {
    padding:15px;
    list-style:none;
}

/* MAIN */
.main {
    margin-left:240px;
    margin-top:60px;
    padding:20px;
}

.cards {
    display:flex;
    gap:15px;
}

.card {
    flex:1;
    padding:20px;
    border-radius:10px;
    color:white;
}

.blue {background:#3b82f6;}
.green {background:#22c55e;}
.orange {background:#f59e0b;}
.red {background:#ef4444;}

/* CHAT */
.chat {
    position:fixed;
    bottom:20px;
    right:20px;
    width:260px;
    background:white;
    border-radius:10px;
}

.chat-header {
    background:#2f4b7c;
    color:white;
    padding:10px;
}

.chat-body {
    padding:10px;
    height:150px;
}
</style>
</head>

<body>

<?php if(!isset($_SESSION['user'])): ?>

<!-- LOGIN PAGE -->
<div class="login-container">
    <div class="login-box">
        <h2>🎓 magistr.cspu.uz</h2>

        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

        <form method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="password" placeholder="Parol" required>
            <button type="submit">Kirish</button>
        </form>
    </div>
</div>

<?php else: ?>

<!-- DASHBOARD -->

<div class="header">
    <h2>🎓 magistr.cspu.uz</h2>
    <div>
        <?= $_SESSION['user']; ?> |
        <a href="?logout=1" style="color:white;">Chiqish</a>
    </div>
</div>

<div class="sidebar">
    <ul>
        <li>Dashboard</li>
        <li>Hujjatlar</li>
        <li>Ilmiy ish</li>
        <li>Chat</li>
        <li>Kalendar</li>
        <li>Natijalar</li>
    </ul>
</div>

<div class="main">

    <div class="cards">
        <div class="card blue">Hujjatlar <h2>12</h2></div>
        <div class="card green">Ilmiy ish <h2>3/5</h2></div>
        <div class="card orange">Topshiriqlar <h2>5</h2></div>
        <div class="card red">GPA <h2>3.8</h2></div>
    </div>

</div>

<div class="chat">
    <div class="chat-header">Rahbar bilan chat</div>
    <div class="chat-body">
        <p><b>Rahbar:</b> Salom</p>
        <p><b>Siz:</b> Yangi bob tayyor</p>
    </div>
</div>

<?php endif; ?>

</body>
</html>