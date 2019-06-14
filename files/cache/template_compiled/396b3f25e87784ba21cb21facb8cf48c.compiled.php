<?php if(!defined("__XE__"))exit;?><thead>
	
	<tr>
		<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
		<?php if($__Context->val->type=='no' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs width70 text-center"><a href="<?php echo getUrl('order_type',$__Context->order_type) ?>" title="<?php if($__Context->order_type=="desc"){;
echo $__Context->lang->order_desc;
}else{;
echo $__Context->lang->order_asc;
} ?>"><?php echo $__Context->lang->no ?> <?php if($__Context->sort_index=='no'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?>
		<?php if($__Context->mi->use_category=='Y'){ ?><th scope="col" class="hidden-xs tablecate"><?php echo $__Context->lang->category ?></th><?php } ?>
		<th scope="col" class="text-center"><a href="<?php echo getUrl('sort_index','title','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->title ?> <?php if($__Context->sort_index=='title'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th>
		<?php } ?>
		<?php if($__Context->val->type=='nick_name' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs tableuser"><?php echo $__Context->lang->writer ?></th><?php } ?>
		<?php if($__Context->val->type=='user_id' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs tableuser"><?php echo $__Context->lang->user_id ?></th><?php } ?>
		<?php if($__Context->val->type=='user_name' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs tableuser"><?php echo $__Context->lang->user_name ?></th><?php } ?>
		<?php if($__Context->val->type=='regdate' && $__Context->val->idx==-1){ ?><th scope="col" class="tabledate"><a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->date;
if($__Context->sort_index=='regdate'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->type=='last_update' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs tabledate"><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>">최근수정<?php if($__Context->sort_index=='last_update'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->type=='last_post' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs tabledate"><?php echo $__Context->lang->last_post ?></th><?php } ?>
		<?php if($__Context->val->type=='readed_count' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs width70"><a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>">조회<?php if($__Context->sort_index=='readed_count'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->type=='voted_count' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs width70"><a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>">추천<?php if($__Context->sort_index=='voted_count'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><th scope="col" class="hidden-xs width70"><a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>">비추천<?php if($__Context->sort_index=='blamed_count'){ ?><i class="fa <?php if($__Context->order_type=="desc"){ ?>fa-caret-down<?php }else{ ?>fa-caret-up<?php } ?> fa-fw"></i><?php } ?></a></th><?php } ?>
		<?php if($__Context->val->idx!=-1){ ?><th scope="col" class="hidden-xs <?php if($__Context->val->eid=='video'){ ?>width50<?php }else{ ?>width70<?php } ?>"><?php if($__Context->val->eid=='video'){;
echo $__Context->val->name;
}else{ ?><a href="<?php echo getUrl('sort_index',$__Context->val->eid,'order_type',$__Context->order_type) ?>"><?php echo $__Context->val->name ?></a><?php } ?></th><?php } ?>
		<?php } ?>
		<?php if($__Context->grant->manager){ ?><th scope="col" class="width30"><input class="checkbox" type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true });" title="Check All" /></th><?php } ?>
	</tr>
</thead>