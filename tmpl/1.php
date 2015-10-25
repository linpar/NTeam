<div id="nteam">
    <div class="container">
        <?php
        $method = $params->get('image-method');
        $tab = $params->get('link-tab');
        if($tab == 'new')
            $target = "_blank";
        else
            $target = "_self";
        for($i=1; $params->get('name_'.$i) != NULL ; $i++)
        {
            $name = $params->get('name_'.$i);
            $field1 = $params->get('field1_'.$i);
            $field2 = $params->get('field2_'.$i);
            $link = $params->get('link_'.$i);
            $image = $params->get('image_'.$i);
            if(!file_exists($image))
            {
                $image = 'media/mod_nteam/img/no-image.jpg';
            }
            $resizeObj = new resize($image);
            $resizeObj -> resizeImage( $width, $height, $method);
            $resizeObj -> saveImage('media/mod_nteam/'.basename($image), 100);
            $image = 'media/mod_nteam/'.basename($image);
            $imageno = $params->get('imageno');

            ?>
            <div class="member">
                <div class="details">
                    <?php
                    if($link != "")
                    {
                        ?>
                        <a href="<?php echo $link;?>" target="<?php echo $target;?>">
                            <img alt="<?php echo $name;?>" src="<?php echo $image;?>" height="170px"/>
                        </a>
                        <?php
                    }
                    else
                    {
                        echo '<img alt="'.$name.'" src="'.$image.'" height="170px"/>';
                    }
                    if($link != "")
                    {
                        ?>
                        <a href="<?php echo $link;?>" target="<?php echo $target;?>">
                            <h2 class="title"><?php echo $name;?></h2>
                        </a>
                        <?php
                    }
                    else
                    {
                        echo '<h2 class="title">'.$name.'</h2>';
                    }
                    ?>
                    <?php
                    if($field1!= "")
                    {
                        ?>
                        <h5 class="field1"><?php echo $field1;?></h5>
                        <?php
                    }
                    if($field2!= "")
                    {
                        ?>
                        <h5 class="field2"><?php echo $field2;?></h5>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if($imageno!=0 && $i%$imageno == 0)
            {?>
                <div style="clear:both;"></div>
            <?php }
        }?>
    </div>
</div>