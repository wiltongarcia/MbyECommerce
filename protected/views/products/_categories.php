    <div class="row">
        <h5>Categories</h5  >
        <?php foreach ($categories as $k => $c): $c=(object)$c;?>
            <input class="checkbox-categories" 
                        id="category-<?php echo $c->id; ?>" 
                            type="checkbox" 
                                data-product="<?php echo $model->id; ?>" 
                                    data-relationship="<?php echo $c->id; ?>"
                                        data-class="ProductCategories"
                                            data-field="category_id" 
                                                <?php echo !empty($c->relation_id) ? 'checked' : ''; ?>>
            <label for="category-<?php echo $c->id; ?>"><?php echo $c->title; ?></label>
        <?php endForeach; ?>
    </div>
