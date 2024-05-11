<?php

class Breadcrumb
{
    protected $_trail;


    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->_trail = array();
    }

    public function add($title, $link = '', $hasLink = false)
    {
        array_push($this->_trail, array('title' => $title, 'link' => $link, 'hasLink' => $hasLink));
    }

    public function pop()
    {
        array_pop($this->_trail);
    }

    public function trail()
    {

        if (isset($_SESSION['city'])) {
            $homeLink = $_SESSION['city'];
        } else {
            $homeLink = '';
        }

        $trail_string  = '<div class="Breadcrumb">';
        $trail_string .= '<a class="home-icon" alt="تولیدات" title="تولیدات" href="'.RELA_DIR.$homeLink.'"><i class="fa fa-home" aria-hidden="true"></i> تولیدات، مرجع جامع اطلاعات کسب و کار</a>';

        foreach ($this->_trail as $key => $value) {
            if ($value['hasLink']) {
                if (strpos($value['link'], 'http://') !== false) {
                    $trail_string .= '<i class="fa slash-left fa-angle-left" aria-hidden="true"></i><a class="container-address" href="'.$value['link'].'"><span>'.$value['title'].'</span></a>';
                    //$trail_string .= '<li><a href="'.$value['link'].'">'.$value['title'].'</a><i class="fa fa-angle-left" aria-hidden="true"></i></li>';
                } else {
                    $trail_string .= '<i class="fa slash-left fa-angle-left" aria-hidden="true"></i><a class="container-address" href="'.RELA_DIR.$value['link'].'"><span>'.$value['title'].'</span></a>';
                    //$trail_string .= '<li><a href="'.RELA_DIR.$value['link'].'">'.$value['title'].'</a><i class="fa fa-angle-left" aria-hidden="true"></i></li>';
                }
            } else {
                $trail_string .= '<i class="fa slash-left fa-angle-left" aria-hidden="true"></i><a class="container-destination"><span>'.$value['title'].'</span></a>';
                //$trail_string .= '<li><a style="cursor: inherit;">'.$value['title'].'</a></li>';
            }
        }

        $trail_string .= '</div>';


//        $trail_string = '<ul id="breadcrumb" class="pull-right">';
//        $trail_string .= '<li><a href="'.RELA_DIR.$homeLink.'"><i class="fa fa-home" aria-hidden="true"></i></a><i class="fa fa-angle-left" aria-hidden="true"></i></li>';
//        foreach ($this->_trail as $key => $value) {
//            if ($value['hasLink']) {
//                if (strpos($value['link'], 'http://') !== false) {
//                    $trail_string .= '<li><a href="'.$value['link'].'">'.$value['title'].'</a><i class="fa fa-angle-left" aria-hidden="true"></i></li>';
//                } else {
//                    $trail_string .= '<li><a href="'.RELA_DIR.$value['link'].'">'.$value['title'].'</a><i class="fa fa-angle-left" aria-hidden="true"></i></li>';
//                }
//            } else {
//                $trail_string .= '<li><a style="cursor: inherit;">'.$value['title'].'</a></li>';
//            }
//        }
//        $trail_string .= '</ul>';

        return $trail_string;
    }
}
