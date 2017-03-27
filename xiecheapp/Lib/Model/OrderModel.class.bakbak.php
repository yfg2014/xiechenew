<?php
//预约模型
class OrderModel extends Model {
		
	public function ListProduct($list_product){
			$model_maintainclass = D('Maintainclass');
			$model_productsale = D('Productsale');
			if(is_array($list_product)){
				foreach($list_product AS $k=>$v){					
					$list_product[$k]['product_detail'] = unserialize($list_product[$k]['product_detail']);
					foreach($list_product[$k]['product_detail'] AS $kk=>$vv){
						$big = $list_product[$k]['product_detail'][$kk]['Big'];
						$midl =$list_product[$k]['product_detail'][$kk]['Midl'];
						$big_arr = $model_maintainclass->where("ItemID=$big")->find();
						$midl_arr = $model_maintainclass->where("ItemID=$midl")->find();
						$sale_arr = $model_productsale->getByProductsale_id($list_product[$k]['product_detail'][$kk]['sale']);
						$list_product[$k]['product_detail'][$kk]['Big'] = $big_arr['ItemName'];
						$list_product[$k]['product_detail'][$kk]['Midl'] = $midl_arr['ItemName'];
						$list_product[$k]['product_detail'][$kk]['sale'] =  $sale_arr['product_sale'];
						$list_product[$k]['product_detail'][$kk]['front_sale'] = $list_product[$k]['product_detail'][$kk]['price']*$list_product[$k]['product_detail'][$kk]['quantity'];
						$list_product[$k]['product_detail'][$kk]['after_sale'] = $list_product[$k]['product_detail'][$kk]['price']*$list_product[$k]['product_detail'][$kk]['quantity']*$list_product[$k]['product_detail'][$kk]['sale'];
						$list_product[$k]['product_detail'][front_total] += $list_product[$k]['product_detail'][$kk]['front_sale'];
						$list_product[$k]['product_detail'][after_total] += $list_product[$k]['product_detail'][$kk]['after_sale'];
					}
				}
				return $list_product;
			}else{
				return false;
				
			}
		
		
	}
	
	
	
//特殊处理
	public function ListProductdetail_S($list_product,$sale_arr){
			$model_maintainclass = D('Maintainclass');
			$model_serviceitem = D('Serviceitem');
			//dump($list_product);
			if(is_array($list_product)){
				
					//$list_product['product_detail'] = unserialize($list_product['product_detail']);				
					//print_r($list_product);
						foreach($list_product AS $k=>$v){
							$service_name = $model_serviceitem->getById($list_product[$k]['service_id']);
							$str .='<table width=600 cellspacing="1" cellpadding="1" border="0" bgcolor="#bfbfbf" align="center">';
							$str .='<caption><br><b>'.$service_name['name'].'</b></caption>';
							$str .='<tr><td bgcolor="#ffffff" width=150>&nbsp;&nbsp;项目</td><td bgcolor="#ffffff" width=60>单价</td><td bgcolor="#ffffff" width=60>数量</td><td bgcolor="#ffffff" width=60>总价</td><td bgcolor="#ffffff" width=60>折扣</td><td bgcolor="#ffffff" width=100>折后总价</td><td bgcolor="#ffffff" width=110>说明</td><tr>';
							$list_detail = $list_product[$k]['product_detail'];
							$list_detail = unserialize($list_detail);
							foreach($list_detail AS $kk=>$vv){
								$list_detail[$kk]['total'] = $list_detail[$kk]['quantity']*$list_detail[$kk]['price'];
								$all_total +=$list_detail[$kk]['total'];
								if($sale_arr['product_sale'] == 0.00){
									$sale_arr['product_sale'] = '无';
									$sale_value['product_sale'] = 1;
								}else{
									$sale_value['product_sale'] = $sale_arr['product_sale'];
								}
								if($sale_arr['workhours_sale'] == 0.00){
									$sale_arr['workhours_sale'] = '无';
									$sale_value['workhours_sale'] = 1;
								}else{
									$sale_value['workhours_sale'] = $sale_arr['workhours_sale'];
								}
								//echo $sale_value['workhours_sale'];
								if($list_detail[$kk]['Midl'] == 516){
									$list_detail[$kk]['after_sale_total'] = $list_detail[$kk]['total']*$sale_value['workhours_sale'];
								$str .='<tr><td bgcolor="#ffffff">&nbsp;&nbsp;'.$list_detail[$kk]['Midl_name'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['price'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['quantity'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['total'].'</td><td bgcolor="#ffffff">'.$sale_arr['workhours_sale'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['after_sale_total'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['content'].'</td><tr>';
								}else{
									$list_detail[$kk]['after_sale_total'] = $list_detail[$kk]['total']*$sale_value['product_sale'];
									$str .='<tr><td bgcolor="#ffffff">&nbsp;&nbsp;'.$list_detail[$kk]['Midl_name'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['price'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['quantity'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['total'].'</td><td bgcolor="#ffffff">'.$sale_arr['product_sale'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['after_sale_total'].'</td><td bgcolor="#ffffff">'.$list_detail[$kk]['content'].'</td><tr>';
								}
								$all_after_total += $list_detail[$kk]['after_sale_total'];
							}
							
							
							
							
							
							
							
							
							
							
							$str .='</table>';
						}
						$save_total = $all_total-$all_after_total;
						$str .='<p align=center><br>通过携车网为您预约，替您节省了<b>' .$save_total.'</b>元！<br>';
						if($_POST['ajax_type'] == 'order'){
							$str .='<a href="'.__URL__.'/addorder/shop_id/'.$_POST['shop_id'].'/select_services/'.$_POST['select_services'].'/product_str/'.$_POST['product_str'].'/model_id/'.$list_product[0]['car_model_id'].'/timesale_id/'.$_POST['timesale_id'].'"><font color=blue><b>点击此处，进行预约</b></font></a></p>';
						}
					return $str;
				
			}else{
					return false;
				
			}
		
	}

}	
?>