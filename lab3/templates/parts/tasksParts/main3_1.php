<h1>Add comment</h1>

<div class="form-container">
    <form class="form" action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required="">
        </div>
        <div class="form-group">
            <label for="comment">Write a comment</label>
            <textarea name="comment" id="comment" rows="10" cols="50" required="">          </textarea>
        </div>
        <button class="form-submit-btn" type="submit">Submit</button>
    </form>
</div>

<h2>↓---------------------Users Comments---------------------↓</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Comment</th>
    </tr>
    <?php
    $file = fopen("comments.txt", "r");

    while (!feof($file)) {
        $line = fgets($file);
        if (!empty($line)) {
            list($name, $comment) = explode("|", $line);
            echo "<tr><td>$name</td><td>$comment</td></tr>";
        }
    }

    fclose($file);
    ?>
</table>