<?php
include '../connect.php';
include 'header.php'; ?>

    <h1 style="opacity:0;">MICHAEL LUKIMAN</h1>
    <h3>.</h3>
    <h4>A SMALL ANTHOLOGY OF <br>POEMS, INSTRUCTIONS, REFLECTIONS, and ESSAYS</h4>
    <h5>by Michael Lukiman</h5>
    <div class="listwrapper"><ul>
    <?
    $sql = "SELECT * FROM logs WHERE category=2 AND id in (SELECT MAX(id) FROM logs GROUP BY link) ORDER BY id DESC LIMIT 20";
    $result = mysql_query($sql);
    $shift = 0;
    if(!$result){
        echo "There are no posts in Michael's database yet.";
    }
    else{
        if(mysql_num_rows($result) == 0){
            echo 'No posts defined yet.';}
        else{
            //prepare the table
            echo '<p>_____<p><br>';

            while($row = mysql_fetch_assoc($result)) {
                echo
                '<li class="dot" style="right:'. $shift .'vw;"></li>
                <li style="position: relative; right: '. $shift .'vw;">
                <a href="posts.php?i=' .$row['link']. '"><div class="post">

                    <h3>' .$row['title']. '</h3>

                    <h5>' .$row['date_created'] . '</h3>

                    <p><i>' .$row['sub1']. '</i></p>
                    <p>' .$row['sub2']. '... <span style="font-size: 12px;">READ MORE ></span></p>

                </div></a>
                </li>';
              $shift = $shift + 5;
            }
    }
    }
    ?>
</ul></div>
<? include '../footer.php'; ?>
