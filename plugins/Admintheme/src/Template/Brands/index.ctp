<?php
$nofrec = $this->Common->getNoOfRec();
$statu = $this->Common->getstatus();
?>
    <section class="content">
        <div class="container-fluid">  

         
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $this->Flash->render() ?> 
                    <div class="fixed-action-btn"><a href="<?= $this->Url->build(['controller' => 'Brands', 'action' => 'add']); ?>" class="btn btn-primary waves-effect btn-floating waves-light btn-large red"><i class="material-icons">add</i></a></div>
                
                    
                    <div class="card">
                        <div class="header">
                          <h2>  <?= __('Brands') ?>
                            </h2>
                        </div>
                        
                          
                       
                        <div class="body">
                            <div class="box-body">
                        <?= $this->Form->create(NULL, ['type' => 'get', 'url' => ['controller' => 'Brands', 'action' => 'index']]) ?>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('name', ['label' => __('Brands Name'), 'class' => 'form-control', 'type' => 'text', 'placeholder' => __('Enter brands Name'), 'value' => $name]); ?>
                        </div>  
                        <div class="col-md-2">
                            <?= $this->Form->input('norec', ['label' => __('No. of Records'), 'type' => 'select', 'class' => 'form-control select2', 'placeholder' => __('select record'),'options' => $nofrec, 'value'=>$norec]); ?>
                        </div>
                                  <div class="col-md-2">
                            <?php echo $this->Form->input('status', ['label' => __('Status'), 'class' => 'form-control select2', 'empty' => __('Select Status'), 'options' => $statu, 'value' => $status]); ?>
                        </div>
                        <div class="col-md-3 marginTop25">
                            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
                           
                            <?= $this->Html->link(__('Clear'), ['controller' => 'Brands'], ['class' => 'btn btn-danger']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div> 
                            <?php if ($this->Paginator->counter(['format' => __('{{count}}')]) != 0) { ?>
                            <table class="table table-bordered table-striped table-hover dataTable responsive">
                                <thead>
                                    <tr>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                     <th><?= __('Name') ?></th>
                                        <th><?= __('status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                     <?php foreach ($brands as $brand): ?>
                                    <tr>
                                        <td><?= $brand->name?></td>
                                      <td id='status<?= $brand->id ?>'>
                                            <?php
                                            if(isset($brand->status)  && $brand->status == '1'){
                                            ?>

  <?= $this->Form->button('Active',['class'=>'btn btn-success waves-effect','id'=>$brand->id,'value'=>$brand->status,'onclick'=>'updateStatus(this.id,'.$brand->status.')' ]) ?>
                                            <?php
                                            } else {
                                                ?>
   <?= $this->Form->button('Inactive',['class'=>'btn btn-primary waves-effect','id'=>$brand->id,'value'=>$brand->status,'onclick'=>'updateStatus(this.id,'.$brand->status.')' ]) ?>
                                                <?php
                                            }
                                            ?>
                                          
                                          
                                          
                                            </td>
                                            <td><?= $brand->created ?></td>
                                        <td>
                                 <i class="material-icons" title="<?= __('view') ?>"><?= $this->Html->link(__('visibility'), ['action' => 'view', $brand->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Edit') ?>"><?= $this->Html->link(__('mode_edit'), ['action' => 'edit', $brand->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Delete') ?>"><?= $this->Form->postLink(__('delete'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete brands ?', $brand->id)]) ?></i>
                    
                    
                                            
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>                             <?php } else { ?>
                            <div>&nbsp;</div>
                        <div class="text-center">
                            <div class="text-center noDataFound">
                                <strong><?= __('Record') ?></strong> <?= __('not found') ?>
                            </div>
                        </div>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            
          
        </div>
    </section>
    
    <script type="text/javascript">
        
        function updateStatus(clicked_id,status)
        {
            
            var id = clicked_id;
              
                var status = status;
                
           var urls = '<?= $this->Url->build(['controller' =>'Brands', 'action' =>'statusUpdate'])?>';
   
           var data = '&id=' + escape(id)+ '&status=' + escape(status);
           
         if(confirm("Are you sure to update status"))
         {
            $.ajax({
                 
        type: "POST",
        
        cache:false,
       
        data: data,
        
        url: urls,
        
        success: function(html)
			{
                            
				
                     $('#status'+id+'').html(html);
             
			} 
    });
    return false;  
         }
         else
         {
             return false;
         }
            
        }
        
        
        </script>


