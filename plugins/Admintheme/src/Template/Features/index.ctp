<?php
$nofrec = $this->Common->getNoOfRec();
$statu = $this->Common->getstatus();
?>
    <section class="content">
        <div class="container-fluid">  

         
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $this->Flash->render() ?> 
                    <div class="fixed-action-btn"><a href="<?= $this->Url->build(['controller' => 'Features', 'action' => 'add']); ?>" class="btn btn-primary waves-effect btn-floating waves-light btn-large red"><i class="material-icons">add</i></a></div>
                
                    
                    <div class="card">
                        <div class="header">
                          <h2>  <?= __('Features') ?>
                            </h2>
                        </div>
                        
                          
                       
                        <div class="body">
                            <div class="box-body">
                        <?= $this->Form->create(NULL, ['type' => 'get', 'url' => ['controller' => 'Features', 'action' => 'index']]) ?>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('name', ['label' => __('Features Name'), 'class' => 'form-control', 'type' => 'text', 'placeholder' => __('Enter feature Name'), 'value' => $name]); ?>
                        </div>  
                        <div class="col-md-2">
                            <?= $this->Form->input('norec', ['label' => __('No. of Records'), 'type' => 'select', 'class' => 'form-control select2', 'placeholder' => __('select record'),'options' => $nofrec, 'value'=>$norec]); ?>
                        </div>
                                  <div class="col-md-2">
                            <?php echo $this->Form->input('status', ['label' => __('Status'), 'class' => 'form-control select2', 'empty' => __('Select Status'), 'options' => $statu, 'value' => $status]); ?>
                        </div>
                        <div class="col-md-3 marginTop25">
                            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
                           
                            <?= $this->Html->link(__('Clear'), ['controller' => 'Features'], ['class' => 'btn btn-danger']) ?>
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
                                     <?php foreach ($features as $feature): ?>
                                    <tr>
                                        <td><?= $feature->name?></td>
                                      <td id='status<?= $feature->id ?>'>
                                            <?php
                                            if(isset($feature->status)  && $feature->status == '1'){
                                            ?>

  <?= $this->Form->button('Active',['class'=>'btn btn-success waves-effect','id'=>$feature->id,'value'=>$feature->status,'onclick'=>'updateStatus(this.id,'.$feature->status.')' ]) ?>
                                            <?php
                                            } else {
                                                ?>
   <?= $this->Form->button('Inactive',['class'=>'btn btn-primary waves-effect','id'=>$feature->id,'value'=>$feature->status,'onclick'=>'updateStatus(this.id,'.$feature->status.')' ]) ?>
                                                <?php
                                            }
                                            ?>
                                          
                                          
                                          
                                            </td>
                                            <td><?= $feature->created ?></td>
                                        <td>
                                 <i class="material-icons" title="<?= __('view') ?>"><?= $this->Html->link(__('visibility'), ['action' => 'view', $feature->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Edit') ?>"><?= $this->Html->link(__('mode_edit'), ['action' => 'edit', $feature->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Delete') ?>"><?= $this->Form->postLink(__('delete'), ['action' => 'delete', $feature->id], ['confirm' => __('Are you sure you want to delete feature ?', $feature->id)]) ?></i>
                    
                    
                                            
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
                
           var urls = '<?= $this->Url->build(['controller' =>'Features', 'action' =>'statusUpdate'])?>';
   
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


