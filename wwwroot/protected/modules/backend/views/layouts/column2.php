<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>    
<div class="row-fluid"> 
        <div class="span2">
            <div class="well-white sidebar-nav">
                <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type' => 'list',
                    'items' => $this->menu,
                ));
                ?>
            </div><!--/.well -->
        </div><!--/span--> 
    <div class="span10">
        <?php echo $content; ?>
    </div><!--/span-->
</div><!--/row-->

<?php $this->endContent(); ?>
<style>
    .my_content{
        background-color: #FFFFFF;
        border: 1px solid #D5D5D5;
        border-radius: 4px 4px 4px 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
    }
</style>