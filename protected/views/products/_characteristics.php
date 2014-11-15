    <div class="row">
        <h5>Characteristics</h5  >
        <?php foreach ($characteristics as $k => $c): $c=(object)$c;?>
            <input class="checkbox-characteristics" 
                        id="characteristic-<?php echo $c->id; ?>" 
                            type="checkbox" 
                                data-product="<?php echo $model->id; ?>" 
                                    data-relationship="<?php echo $c->id; ?>"
                                        data-class="ProductCharacteristic"
                                            data-field="characteristic_id"
                                                <?php echo !empty($c->relation_id) ? 'checked' : ''; ?>>
            <label for="characteristic-<?php echo $c->id; ?>"><?php echo $c->title; ?></label>
        <?php endForeach; ?>
    </div>
