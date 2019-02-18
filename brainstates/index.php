<?php
include 'connect.php';
include 'header.php'; ?>
<div id="news">
    <div><h1 style="opacity:0; float:right;">MICHAEL LUKIMAN</h1>
    <h3>BRAINSTATES</h3>
    <h4 style="position: relative; top: -15px; left: -5px;">state of the connectome</h4>
    <h5 style="position: relative; top: -40px; left: -5px;">via edu in neuro-, bio-, comp-science, & AI</h5>
    <h5 style="position: relative; top: -65px; left: -5px;">by Michael Lukiman</h5></div>
    <?
    $sql = "SELECT * FROM logs WHERE category=1 AND id in (SELECT MAX(id) FROM logs GROUP BY link) ORDER BY id DESC LIMIT 100";
    $result = mysql_query($sql);
    $ind = 0;
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
                '<a href="posts.php?i=' .$row['link']. '"><div class="post">

                    <h3>' .$row['title']. '</h3>

                    <h5>#'. $row['id'] .' '. $row['date_created'] .'</h3>

                    <p><i>' .$row['sub1']. '</i></p>
                    <p>' .$row['sub2']. '... <span style="font-size: 12px;">READ MORE ></span></p>

                </div></a>';
                $ind = $ind + 1;}
    }
    }
    ?>
</div>
<? include 'http://michaellukiman.com/footer.php'; ?>
