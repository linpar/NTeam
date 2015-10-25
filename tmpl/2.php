<div id="nteam">
    <div class="container">
        <?php
        $method = $params->get('image-method');
        $tab = $params->get('link-tab');
        if($tab == 'new')
            $target = "_blank";
        else
            $target = "_self";
        for($i=1; $params->get('name_'.$i) != NULL ; $i++) {
            $name = $params->get('name_' . $i);
            $field1 = $params->get('field1_' . $i);
            $field2 = $params->get('field2_' . $i);
            $link = $params->get('link_' . $i);
            $image = $params->get('image_' . $i);
            if (!file_exists($image)) {
                $image = 'media/mod_nteam/img/no-image.jpg';
            }
            $resizeObj = new resize($image);
            $resizeObj->resizeImage($width, $height, $method);
            $resizeObj->saveImage('media/mod_nteam/' . basename($image), 100);
            $image = 'media/mod_nteam/' . basename($image);
            $imageno = $params->get('imageno');

            ?>
            <div class="member">
                <img alt="<?php echo $name; ?>" src="<?php echo $image; ?>"/>
                <div class="mask"><h2 class="title"><?php echo $name; ?></h2>
                    <?php
                    if($field1!= "")
                        echo '<p class="field1">' . $field1 . '</p>';
                    if($field2!= "")
                        echo '<p class="field2">' . $field2 . '</p>';
                    ?>
                    <a href="<?php echo $link; ?>" class="info" target="<?php echo $target;?>">Social</a>
                </div>
            </div>

            <?php
            if($imageno!=0 && $i%$imageno == 0)
            {
                echo '<div style="clear:both;"></div>';
            }
        }
        ?>
    </div>
</div>