<?php
class Pagination {
    private $total_results;
    private $records_per_page;
    private $offset;
    private $total_pages;
    private $current_page;
    private $url;

    function __construct($total_results) {
        $this->total_results = $total_results;

        // establish records per page
        if(!empty($_GET['show']) && is_numeric($_GET['show']) && $_GET['show']>=10) {
            if($_GET['show']==10 || $_GET['show']==25 || $_GET['show']==50 || $_GET['show']==100) {
                $this->records_per_page = $_GET['show'];
            }
            else {
                $this->records_per_page = 10;
            }
        } 
        else {
            $this->records_per_page = 10;
        }

        if (!empty($_GET['page']) && is_numeric($_GET['page'])) {
            $this->current_page = $_GET['page'];
        } 
        else {
            $this->current_page = 1;
        }

        $this->url = $this->get_url();
        $this->offset = ($this->current_page - 1) * $this->records_per_page;
        $this->total_pages = ceil($this->total_results / $this->records_per_page);
    }

    function get_page() {
        return $this->current_page;
    }

    function get_offset() {
        return $this->offset;
    }

    function get_records_per_page() {
        return $this->records_per_page;
    }

    private function get_url() {
        $url = '';

        if(isset($_GET)) {
            foreach($_GET as $id => $value) {
                // we avoid pages because they are already set in the footer     
                if($id!='page') {
                    $url = $url."&$id=$value";
                }
            }
        }

        return $url;
    }

    private function print_button($page_number, $text, $button_css_class = '') {
        echo '<a href="?page='.$page_number.$this->url.'" class="'.$button_css_class.'">'.$text.'</a>';
    }

    private function print_show_form($show_form_html_header = '', $show_form_html_footer = '') {
        if($this->total_results>10) {
            echo $show_form_html_header;

            echo '<p>Show</p>';
            echo '<form method="GET" id="show">';

            if(isset($_GET)) {
                foreach($_GET as $id => $value) {
                    // we avoid pages and show because they change once you change the amount to show       
                    if($id!='page' && $id!='show') {
                        echo '<input type="hidden" name="'.$id.'" value="'.$value.'">';
                     }
                }
            }
            
            echo '<select name="show" onchange="changeShowAmount();">';

            if($this->records_per_page==10) {
                echo '<option value="10" selected>10</option>';
            }
            else {
                echo '<option value="10">10</option>';
            }

            if($this->total_results>=25) {
                if($this->records_per_page==25) {
                    echo '<option value="25" selected>25</option>';
                }
                else {
                    echo '<option value="25">25</option>';
                }
            }

            if($this->total_results>=50) {
                if($this->records_per_page==50) {
                    echo '<option value="50" selected>50</option>';
                }
                else {
                    echo '<option value="50">50</option>';
                }
            }

            if($this->total_results>=100) {
                if($this->records_per_page==100) {
                    echo '<option value="100" selected>100</option>';
                }
                else {
                    echo '<option value="100">100</option>';
                }
            }

            echo '</select>';
            echo '</form>';
            echo "<p>of $this->total_results</p>";

            echo '<script>
            function changeShowAmount() {
                document.getElementById("show").submit();
            }
            </script>';

            echo $show_form_html_footer;
        }
    }

    function print($pagination_template) {

        echo $pagination_template['pagination_html_header'];

        $this->print_show_form($pagination_template['show_form_html_header'], $pagination_template['show_form_html_footer']);

        echo $pagination_template['pagination_html_body'];

        // previous page
        if($this->current_page > 1) {
            $this->print_button($this->current_page-1, '<<', $pagination_template['pagination_button_css_class']);
        }

        if($this->total_pages > 1) {
            // first page
            if ($this->current_page != 1) {
                $this->print_button(1, '1', $pagination_template['pagination_button_css_class']);
            }

            // place holder, we don't show it in the first 3 pages
            if ($this->current_page != 1 && $this->current_page != 2 && $this->current_page != 3) {
                echo '<span class="'.$pagination_template['pagination_placeholder_css_class'].'">...</span>';
            }

            // backward pages
            if ($this->current_page - 2 >= 2) {
                $this->print_button($this->current_page-2, $this->current_page-2, $pagination_template['pagination_button_css_class']);
            }
            if ($this->current_page - 1 > 1) {
                $this->print_button($this->current_page-1, $this->current_page-1, $pagination_template['pagination_button_css_class']);
            }

            // show current page
            echo '<span class="'.$pagination_template['pagination_currentpage_css_class'].'">'.$this->current_page.'</span>';

            // foward pages
            if ($this->current_page + 1 < $this->total_pages) {
                $this->print_button($this->current_page+1, $this->current_page+1, $pagination_template['pagination_button_css_class']);
            }
            if ($this->current_page + 2 < $this->total_pages) {
                $this->print_button($this->current_page+2, $this->current_page+2, $pagination_template['pagination_button_css_class']);
            }

            // place holder, we don't show it is its the last 3 pages
            if ($this->current_page != $this->total_pages && $this->current_page != $this->total_pages - 1 && $this->current_page != $this->total_pages - 2) {
                echo '<span class="'.$pagination_template['pagination_placeholder_css_class'].'">...</span>';
            }

            // last page
            if($this->current_page != $this->total_pages) {
                $this->print_button($this->total_pages, $this->total_pages, $pagination_template['pagination_button_css_class']);
            }
        }

        // next page
        if($this->current_page < $this->total_pages) {
            $this->print_button($this->current_page+1, '>>', $pagination_template['pagination_button_css_class']);
        }

        echo $pagination_template['pagination_html_footer'];
    }
}
?>