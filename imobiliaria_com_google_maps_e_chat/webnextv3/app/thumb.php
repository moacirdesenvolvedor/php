<?php
error_reporting(0);
/*
 * @author Rafael Clares <rafael@clares.com>
 * @version 3.0 <11/2013>
 * www.clares.com.br
 */

class Thumb extends PHPFrodo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        if ( isset( $this->uri_segment[1] ) )
        {
            $pic = "app/fotos/" . $this->uri_segment[1] . ".jpg";
            if ( !file_exists( $pic ) )
            {
                $pic = "app/images/default/nopic.jpg";
            }
            $this->helper( 'canvas' );
            $t = new Canvas;
            $t->carrega( $pic );
            if ( isset( $this->uri_segment[4] ) )
            {
                $t->redimensiona( $this->uri_segment[2], $this->uri_segment[3], 'crop' );
            }
            elseif ( isset( $this->uri_segment[2] ) && isset( $this->uri_segment[3] ) )
            {
                $t->redimensiona( $this->uri_segment[2], $this->uri_segment[3] );
            }
            $t->marca( "app/images/layout/marca.png", 'baixo', 'direita' );
            $t->grava( '', 90 );
        }
    }
}
/*end file*/
