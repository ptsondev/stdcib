<?php

/*
  Template Name: Page Ship Items
 */
?>
<?php get_header('ship'); ?>

<div id="main-home">
	<div id="map-canvas"></div>
	<?php 
		global $wpdb;
		$list_items = $wpdb->get_results( 'SELECT * FROM items_info WHERE (status = 0 OR status IS NULL) AND title <> ""');
		$center_item = $list_items[0];	
		echo '<script>initialize(' . $center_item->lat . ', ' . $center_item->lng . ');</script>';			
	?>
	
	<!--<div id="search-area">
		<div class="filter">
			<select id="filter-disctrict">
				<option>Quận 1</option><option>Quận 2</option><option>Quận 3</option><option>Quận 4</option><option>Quận 5</option><option>Quận 6</option><option>Quận 7</option><option>Quận 8</option><option>Quận 9</option><option>Quận 10</option><option>Quận 11</option><option>Quận 12</option>
				<option>Quận Phú Nhuận</option>
				<option>Quận Gò Vấp</option>
				<option>Quận Bình Thạnh</option>
				<option>Quận Tân Bình</option>
				<option>Quận Tân Phú</option>
				<option>Quận Bình Tân</option>
			</select>
		</div>		
	</div>-->
	
	
	<div id="list-items">
            <?php 
				
                foreach ($list_items as $item) {
                    echo '<div id="item-' . $item->nid . '" class="item col-sm-4 col-xs-6 col-xxs-12">';
						echo '<div class="item-wrapper">';
							echo '<div class="id"><b>'.$item->title.'</b> - '.$item->u_phone.' - COD: '.$item->price.'</div>';
							echo '<div class="address"> '.$item->u_address.'</div>';                        
						echo '</div>';
                    echo '</div>';
                    echo '<script>addMarker(' . $item->nid . ',' . $item->lat . ', ' . $item->lng . ', "' . $item->title . '", "' . $item->u_address . '");</script>';                   
                }
            ?>

    </div>
</div>	
	
