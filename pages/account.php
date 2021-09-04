<?php
require_once 'objects/DB.php';
require_once 'messages/const.php';

$id = $_SESSION['user_id'];

$conn = new DB();
$user = $conn->show($id, USERS);
$users = $conn->all(USERS,$id);
$fr =$conn->friends_request($id);
$friends = $conn->friends($id);
json_encode($fr)
?>
<img src='<?= AVATAR_PATH . $user->avatar; ?>' width='200' alt=''><br>
<!--created_at-->
<!--basename-->
<?php
echo "NAME : " . $user->user_name;
echo "<br>";
echo "PHONE : " . $user->phone;
echo "<br>";
echo "EMAIL : " . $user->email;
?>

<ul>
    <?php foreach ($users as $index => $u) : ?>
        <li>
            <input type="checkbox" name="fr[]" class="fr" value="<?= $u['id']?>">
            <?= $u['user_name'] . " "
            ?>
        </li>
    <?php endforeach; ?>
</ul>
<ul>
    <h3>Friends Request</h3>
    <?php foreach ($fr as $index => $i) : ?>
    <li>
        <img src='<?= AVATAR_PATH . $i['avatar']; ?>' width='50' style="border-radius: 50%" alt=''>
        <?= "<span style='font-size: 30px'>" . $i['user_name'] . "</span>" ?>
        <input type="hidden" name="friends_id" value="<?= $i['user_id']?>">
        <input style="width: 90px" id="approved" type="submit" name="<?= $i['user_id'] ?>" value="approved">
        <input style="width: 90px" id="reject" type="submit" name="<?= $i['user_id'] ?>" value="Reject">
    </li>
    <?php endforeach; ?>
</ul>
<ul>
    <p>FRIENDS</p>
    <?php foreach  ($friends as $index => $it) : ?>
        <li class="friends">
            <?= '<span style="color: black">' . $it['user_name'] . '</span>' ?>
            <img src="<?= AVATAR_PATH . $it['avatar']; ?>" width='100' alt=''><br><br>
        </li>
    <?php endforeach; ?>
</ul>
<!--<form action='' method='post' enctype="multipart/form-data">-->
<!--    <label for='file'></label>-->
<!--    <input type='file' id='file' name='upload'>-->
<!--    <button type="submit">Upload Avatar</button>-->
<!--</form>-->

<!--<form action="zip/zip.php" method="post" >-->
<!--    <button type="submit">zip</button>-->
<!--</form>-->

<!--<form action="logout.php" method="post">-->
<!--    <input type="submit" value="logout" id="sub">-->
<!--    <label for="sub"></label>-->
<!--</form>-->
