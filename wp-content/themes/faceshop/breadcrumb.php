<div id="breadcrumb">
<?php
    echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList">';
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        echo '<a href="'. get_site_url().'" itemprop="item">';
            echo '<span itemprop="name">'; 
                echo 'Trang Chủ';
            echo '</span>';
        echo '</a> › ';   
		echo '<meta itemprop="position" content="1" />';
		echo '</li>';        
        $queried_object = get_queried_object();
        if(is_page()){
            echo '<span itemprop="name">'.$queried_object->post_title.'</span>';     
        }
        if(is_single()){
            if ($queried_object->post_type == 'article'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_ARTICLE).'" itemprop="url">';
                    echo '<span itemprop="name">'; 
                        echo 'Bài Viết';
                    echo '</span>';
                echo '</a> › ';      
				echo '<meta itemprop="position" content="2" />';
				echo '</li>';
            }else if($queried_object->post_type == 'product'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_PRODUCT).'" itemprop="url">';
                    echo '<span itemprop="name">'; 
                        echo 'Sản phẩm';
                    echo '</span>';
                echo '</a> › ';      
				echo '</li>';
				echo '<meta itemprop="position" content="2" />';
            }
            // last level
            echo '<span itemprop="title">'.$queried_object->post_title.'</span>';     
        }
        if(is_tax()){
            if($queried_object->taxonomy=='product_category'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_PRODUCT).'" itemprop="url">';
                    echo '<span itemprop="name">'; 
                        echo 'Sản phẩm';
                    echo '</span>';
                echo '</a> › ';    
				echo '<meta itemprop="position" content="2" />';
				echo '</li>';
            }
            echo '<span itemprop="name">'.$queried_object->name.'</span>';     
        }        
    echo '</ol>';
?>
</div>