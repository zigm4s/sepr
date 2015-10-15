<?php
/**
 * Created by PhpStorm.
 * User: zslusnys
 * Date: 8-10-15
 * Time: 12:44
 */

?>
<form method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title"><br />
    File: <input type="file" name="uploadfile"><br />
    Can others comment? <input type="checkbox" name="can_comment"><br />
    Private picture? <input type="checkbox" name="is_private"><br />

    <input type="submit" name="submit">

</form>
