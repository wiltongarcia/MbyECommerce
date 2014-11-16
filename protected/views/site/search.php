            <?php $this->renderPartial('_sidebar', array('categories'=>$categories)); ?>
            <div id="content">
                <?php $this->renderPartial('_list', array('list'=>$search['results'], 'name'=>"Search: {$search['term']}")); ?>
                <h1 style="display: none;">Your Store</h1>
            </div>
            <?php $this->renderPartial('_scriptcart'); ?>
