<body>
<?php
require_once 'messages/const.php';
?>
<header>
    <ul>
        <?php if (empty($_SESSION['user_id'])): ?>
            <li>
                <a href="index.php?page=login">
                    login
                </a></li>
            <li><a href="index.php?page=registration">
                    registration
                </a></li>
        <?php else:?>
            <li>

                <a href="index.php?page=logout">logout</a>
            </li>
        <?php endif; ?>
        <li><a href="index.php?page=posts">
                posts
            </a>
        </li>

    </ul>
    <?php if (!empty($_SESSION['user_id'])): ?>
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
    <?php endif;?>
</header>

