<?php
include '../connect.php';
include '../header_step_up.php'; ?>

<div id="functions">
<h2>Functions</h2>
<h3>clean code, learning modules, programs, information handlers, automation </h3>
    <?
    $sql = "SELECT title FROM logs";
    $result = mysql_query($sql);

    if(!$result){
        echo "There are no posts in Michael's database yet.";
    }
    else{
        if(mysql_num_rows($result) == 0){
            echo 'No posts defined yet.';}
        else{
            //prepare the table
            echo '<h3>News</h3>';

            while($row = mysql_fetch_assoc($result)) {
                echo '<div class="post"><h3><a href="posts.php?i='. $row['title'] . '">a' .$row['date_created'] . '</a></h3>' .$row['body1']. '</div>';}
    }
    }
    ?>
</div>

<? include '../footer.php'; ?>