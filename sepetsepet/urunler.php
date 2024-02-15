<?php
class urunler extends baglanti
{
    public function control ($id)
    {
        $sorgu=$this->db->prepare("select * from urunler where id= ?");
        $sorgu->execute(array($id));
        return $sorgu->rowCount();
    }

    public function bilgi($id)
    {
        $sorgu=$this->db->prepare("select * from urunler where id= ?");
        $sorgu->execute(array($id));
        return $sorgu->fetch(PDO::FETCH_ASSOC);  
    }



}
?>