<?php

class PageControler
{

    public function home()
    {
        echo "estoy en home";
    }

    public function items()
    {
        echo "estoy en items";
    }

    public function item($id)
    {
        echo "estoy en item $id";
    }
}
