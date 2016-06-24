<div id="breadcrumb">
<?php
    echo '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        echo '<a href="'. get_site_url().'" itemprop="url">';
            echo '<span itemprop="title">'; 
                echo 'Trang Chủ';
            echo '</span>';
        echo '</a> › ';           
        $queried_object = get_queried_object();
        if(is_page()){
            echo '<span itemprop="title">'.$queried_object->post_title.'</span>';     
        }
        if(is_single()){
            if ($queried_object->post_type == 'article'){
                echo '<a href="'.  get_permalink(PID_ARTICLE).'" itemprop="url">';
                    echo '<span itemprop="title">'; 
                        echo 'Bài Viết';
                    echo '</span>';
                echo '</a> › ';      
            }else if($queried_object->post_type == 'product'){
                echo '<a href="'.  get_permalink(PID_PRODUCT).'" itemprop="url">';
                    echo '<span itemprop="title">'; 
                        echo 'Sản phẩm';
                    echo '</span>';
                echo '</a> › ';      
            }
            // last level
            echo '<span itemprop="title">'.$queried_object->post_title.'</span>';     
        }
        if(is_tax()){
            if($queried_object->taxonomy=='product_category'){
                echo '<a href="'.  get_permalink(PID_PRODUCT).'" itemprop="url">';
                    echo '<span itemprop="title">'; 
                        echo 'Sản phẩm';
                    echo '</span>';
                echo '</a> › ';    
            }
            echo '<span itemprop="title">'.$queried_object->name.'</span>';     
        }        
    echo '</div>';
?>
</div>