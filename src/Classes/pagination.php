<?php
class Pagination {
    private $query;
    private $total_results;
    private $records_per_page;
    private $offset;
    private $total_pages;
    private $current_page;
    private $url;

    private $template_header;
    private $template_body;
    private $template_footer;

    private $template_show_header;
    private $template_show_footer;
    
    private $template_button_css_class;
    private $template_placeholder_css_class;
    private $template_currentpage_css_class;

    public function __construct($total_results) {
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

    public function set_template_header($html) {
        $this->template_header = $html;
    }

    public function set_template_body($html) {
        $this->template_body= $html;
    }

    public function set_template_footer($html) {
        $this->template_footer = $html;
    }

    public function set_template_show_header($html) {
        $this->template_show_header = $html;
    }

    public function set_template_show_footer($html) {
        $this->template_show_footer = $html;
    }

    public function set_template_button_css_class($html) {
        $this->template_button_css_class = $html;
    }

    public function set_template_placeholder_css_class($html) {
        $this->template_placeholder_css_class = $html;
    }

    public function set_template_currentpage_css_class($html) {
        $this->template_currentpage_css_class = $html;
    }

    public function get_page() {
        return $this->current_page;
    }

    public function get_offset() {
        return $this->offset;
    }

    public function get_records_per_page() {
        return $this->records_per_page;
    }

    public function print() {

        echo $this->template_header;

        $this->print_show_form();

        echo $this->template_body;

        // previous page
        if($this->current_page > 1) {
            $this->print_button($this->current_page-1, '<<');
        }

        if($this->total_pages > 1) {
            // first page
            if ($this->current_page != 1) {
                $this->print_button(1, '1');
            }

            // place holder, we don't show it in the first 3 pages
            if ($this->current_page != 1 && $this->current_page != 2 && $this->current_page != 3) {
                echo '<span class="'.$this->template_placeholder_css_class.'">...</span>';
            }

            // backward pages
            if ($this->current_page - 2 >= 2) {
                $this->print_button($this->current_page-2, $this->current_page-2);
            }
            if ($this->current_page - 1 > 1) {
                $this->print_button($this->current_page-1, $this->current_page-1);
            }

            // show current page
            echo '<span class="'.$this->template_currentpage_css_class.'">'.$this->current_page.'</span>';

            // foward pages
            if ($this->current_page + 1 < $this->total_pages) {
                $this->print_button($this->current_page+1, $this->current_page+1);
            }
            if ($this->current_page + 2 < $this->total_pages) {
                $this->print_button($this->current_page+2, $this->current_page+2);
            }

            // place holder, we don't show it is its the last 3 pages
            if ($this->current_page != $this->total_pages && $this->current_page != $this->total_pages - 1 && $this->current_page != $this->total_pages - 2) {
                echo '<span class="'.$this->template_placeholder_css_class.'">...</span>';
            }

            // last page
            if($this->current_page != $this->total_pages) {
                $this->print_button($this->total_pages, $this->total_pages);
            }
        }

        // next page
        if($this->current_page < $this->total_pages) {
            $this->print_button($this->current_page+1, '>>');
        }

        echo $this->template_footer;
    }

    public function get_query() {
        return $this->query;
    }

    public function set_query($query) {
        $this->query = $query;
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

    private function print_button($page_number, $text) {
        echo '<a href="?page='.$page_number.$this->url.'" class="'.$this->template_button_css_class.'">'.$text.'</a>';
    }

    private function print_show_form() {
        if($this->total_results>10) {
            echo $this->template_show_header;

            echo '<p>Show</p>';
            echo '<form method="GET" id="show_form">';

            if(isset($_GET)) {
                foreach($_GET as $id => $value) {
                    // we avoid pages and show because they change once you change the amount to show       
                    if($id!='page' && $id!='show') {
                        echo '<input type="hidden" name="'.$id.'" value="'.$value.'">';
                     }
                }
            }
            
            echo '<select name="show" id="show_amount">';

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
            const show_amount = document.querySelector("#show_amount");
            show_amount.addEventListener("change", (e) => {
                document.getElementById("show_form").submit();
            });
            </script>';

            echo $this->template_show_footer;
        }
    }
}
?>