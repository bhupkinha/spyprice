<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
                 <?php 
                 
                 if(isset($Products) && !empty($Products))
                 {
                 foreach ($Products as $product): ?>
                                <div class="col-sm-4">
                                    <div class="box">
                                        <div class="box-img">
                                            <?php
                                            $cover = '/img/' . $product->images;

                                            if ($product->images == '') {
                                                $cover = '/img/placeholder.jpg';
                                            }
                                            ?>
                                            <?= $this->Html->image($cover, ['alt' => 'related-news', 'class' => 'img-rounded ', 'accept' => 'image/*']); ?>
                                        </div>
                                        <div class="box-heading">
                                            <?= $this->Common->turnCatefun($product->name,50 )?>
                                        </div>
                                        <div class="box-price">
                                            <strong>&#8360; <?= $product->price ?></strong>
                                        </div>

                                    </div>
                                </div>
                 <?php endforeach; } else { ?>
                           <div class="col-sm-12">
                                    <div class="box">
                                        <h1>  No Data found Try again </h1>    
                                         <div class="box-img">
                                            <?php
                                            
                                                $cover = '/img/placeholder.jpg';
                                           
                                            ?>
                                            <?= $this->Html->image($cover, ['alt' => 'related-news', 'class' => 'img-rounded ', 'accept' => 'image/*']); ?>
                                        </div>
                                       </div>
                                </div> 

                 <?php } ?>
