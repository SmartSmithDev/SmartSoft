<?php

namespace App\libraries;




class General {
// function to create modals
  
  public static function modal($header='title',$modalId='myModal', $body=array(" "),$buttonText='Save',$buttonClass='default',$buttonId='buttonId'){
    $modal='<div id="'.$modalId.'" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">'.$header.'</h4>
    </div>
    <div class="modal-body" style="overflow-y: hidden"><!-- for floating element i.e clearfix hack  -->';

    foreach($body as $content){
      $modal=$modal.$content;
    }

    $modal=$modal.'</div>
    <div class="modal-footer">
    <button  class="btn btn-'.$buttonClass.'" id="'.$buttonId.'">'.$buttonText.'</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
    </div>';
    return $modal;
  }
}