<?php
class sepet
{

    public function sepeteEkle($id,$sayi)
    {
        $_SESSION['sepet'][$id]=$sayi;
    }
    
}

?>