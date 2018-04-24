<?php

$statu = $this->Common->getstatus();
$nofrec = $this->Common->getNoOfRec();
?>
<style type="text/css">
    .writer {
        font-size: 11px;
        color: #898989;
        padding: 0px 0px 0px 0px;
        margin: 5px 0px 5px;
    }
    .writer span:after{ content: " | "; }
    .writer span:last-child:after{ content: " "; } 
    .card .footer {
        color: #555;
        padding: 20px;
        position: relative;
        border-top: 1px solid rgba(204, 204, 204, 0.35);
    }
</style> 

<section class="content">
    <div class="fixed-action-btn"><a href="<?= $this->Url->build(['controller' => 'Product', 'action' => 'add']); ?>" class="btn btn-primary waves-effect btn-floating waves-light btn-large red"><i class="material-icons">add</i></a></div>

    <div class="container-fluid">
        <div class="block-header">
            <h2>Product</h2>
        </div>
        <div class="row clearfix" style="margin-bottom: 20px;"><?= $this->Flash->render() ?></div>
            <?= $this->Form->create(NULL, ['type' => 'get', 'url' => ['controller' => 'Product', 'action' => 'index']]) ?>
          
        
                        <?= $this->Form->end() ?>
        </div> 
        <div class="container-fluid list-news">
            <div class="row clearfix marginTop25">
            <?php if ($this->Paginator->counter(['format' => __('{{count}}')]) != 0) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-block">
                    <!-- news list -->
                    <?php foreach ($product as $product) :?>
                      <div class="list-news-block">
                            <div class="media">
                                <div class="media-left">
                                        <div class="list-img">
                                            <?php
                                            $cover = '/img/' . $product->images;
                                           
                                            if($product->images ==''){
                                                $cover = '/img/placeholder.jpg';
                                            }
                                            ?>
                                  <?= $this->Html->image($cover, ['alt' => 'related-news','class'=>'img-rounded ', 'accept' => 'image/*']); ?>
                                        </div>
                                </div>
                                <div class="media-body">
                                    <div class="news-detail">
                                        <h3 class="headline pull-left"><a href="<?= $this->Url->build(['controller' => 'Product', 'action' => 'view', $product['id']]); ?>" title="<?= $product->name ?>"><?= $product->name ?>  </a></h3>
                                        <div class="pull-right">
                                            <a href="<?= $this->Url->build(['controller' => 'Product', 'action' => 'edit', $product['id']]); ?>" class="btn btn-link icon-align"><i class="material-icons col-teal">mode_edit</i> Edit</a>
                                            <a href="<?= $this->Url->build(['controller' => 'Product', 'action' => 'delete', $product['id']]); ?>" class="btn btn-link icon-align" onclick="if (confirm(&quot;Are you sure you want to delete # Product?&quot;)) { return true; } return false;"><i class="material-icons col-red">delete</i>Delete</a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="writer">
                                            <span class="category"><?= $product->category->name ?></span>

                                        </p>
                                       
                                        <hr class="no-margin" style="margin-bottom: 5px;">
                 
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    <?php endforeach; ?>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

                </div>
            <?php } else { ?>
                <div>&nbsp;</div>
                <div class="text-center">
                    <div class="text-center noDataFound">
                        <strong><?= __('Record') ?></strong> <?= __('not found') ?>
                    </div>
                </div>
            <?php } ?>
            </div>

        </div>

</section>

<script>

    function deleteAll()
    {
        var id = "1";
        var urls = '<?= $this->Url->build(['controller' =>'Product', 'action' =>'Deleteall'])?>';
        var data = '&id=' + escape(id);
        if (confirm("Are you sure to Delete All Product ?"))
        {
            $.ajax({

                type: "POST",
                cache: false,
                data: data,
                url: urls,
                success: function (html)
                {
                    window.location = '<?= $this->Url->build(['controller' =>'Product', 'action' =>'index'])?>';
                }
            });
            return false;
        } else
        {
            return false;
        }
    }


</script>
<script>
       $(document).ready(function () {
            $('#date-end').bootstrapMaterialDatePicker({ format : 'YYYY/MM/DD HH:mm', weekStart : 0 });
            $('#date-start').bootstrapMaterialDatePicker({format : 'YYYY/MM/DD HH:mm', weekStart : 0 }).on('change', function(e, date)
            {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
            });
       });

</script>