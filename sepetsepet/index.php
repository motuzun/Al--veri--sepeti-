<?php
session_start();
require_once 'baglanti.php';
require_once 'urunler.php';
require_once 'sepet.php';
$sepet= new sepet();
$urunler=new urunler();;
$baglanti=new baglanti();

if(isset($_GET['kaldir']))
        {
            $sepetId= intval($_GET['kaldir']);
            if(isset($_SESSION['sepet'][$sepetId]))
            {
                $urunControl=$urunler->control($sepetId);
                if($urunControl !=0)
                {
                    unset($_SESSION['sepet'][$sepetId]);

                }
                else
                {
                    echo 'Bu ürün yok';
                }

            }
            else
            {
                echo 'Boş';
            }
        }

if(isset($_GET['id']))
{
    $id=intval($_GET['id']);
    if($urunler->control($id) !=0)
    {
       
        if($_POST)
        {
            $sayi= intval($_POST['sayi']);
            $sepet->sepeteEkle($id,$sayi);
        }




        $bilgi= $urunler->bilgi($id);
        echo $bilgi['ad'];
        echo '<br/>';
        echo $bilgi['fiyat'];
        ?>
        <form action="" method="POST">
            <input type="number" name="sayi" value="1">
            <button>Ekle</button>
        </form>


<?php
echo 'sepetiniz <br/>';
if(count($_SESSION['sepet'])!=0)
{
    $toplam=[];
    foreach ($_SESSION ['sepet'] as $key => $value)
    {
     $urunInfo= $urunler->bilgi($key);
     $fiyat= $urunInfo['fiyat']*$value;
     $toplam[]= $fiyat;
     echo '<a href="?kaldir='.$key.'">'. $urunInfo['ad'] ."x". $value. ":".$fiyat."TL</a><br/>";
    }
    echo 'Toplam: ' .array_sum($toplam).' TL';

}
else
{
    echo'Sepetiniz Boş';
}

    }
    else
    {
        echo 'İstediğiniz ürün yok';
    }

}








?>
