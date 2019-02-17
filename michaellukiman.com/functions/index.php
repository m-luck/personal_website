<?php
include 'connect.php';
include 'header.php'; ?>
<div id="news">
    <div><h1 style="opacity:0;">MICHAEL LUKIMAN</h1>
    <h3 style="font-family: 'Kaushan Script'; color: white; font-size: 4vh;">f(x)</h3>
    <h4>input to output</h4>
    <?
    $sql = "SELECT * FROM logs WHERE category=3 AND id in (SELECT MAX(id) FROM logs GROUP BY link) ORDER BY id DESC LIMIT 20";
    $result = mysql_query($sql);
    if(!$result){
        echo "There are no posts in Michael's database yet.";
    }
    else{
        if(mysql_num_rows($result) == 0){
            echo 'No posts defined yet.';}
        else{
            while($row = mysql_fetch_assoc($result)) {
                echo
                '<div><a href="posts.php?i=' .$row['link']. '"><div class="posts">
                    <div class="title">' .$row['title']. '</div>
                    <div class="left">' .$row['sub1'] . '</div>
                    <div class="right">' .$row['sub2']. '</div>
                </div></a></div>';}
    }
    }
    ?>
</div>

<? include '../footer.php'; ?>
