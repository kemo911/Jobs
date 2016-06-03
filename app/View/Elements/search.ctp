<div id="search_area" class="col_12 column" >
        <form class="horizontal" method="post" action="http://localhost/project/jobs/browse">
            <input name="keywords" id="keywords" type="text" placeholder="Enter Keywords..">
            <select name="state" id="state_select">
                <option>Select State</option>
                <option>Germany</option>
                <option>Netherlands</option>
                <option>Hungary</option>
                <option>USA</option>
                <option>Romania</option>
                <option>Malaysia</option>
                <option>Thailand</option>

            </select>
            
            <select id="category_select" name="category">
                <option>Select category</option>
                    <?php foreach( $categories as $category) : ?>
                        <option value="<?php echo $category['Category']['id']?>" > <?php echo $category['Category']['name'] ;?> </option>
                    <?php endforeach ;?>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>