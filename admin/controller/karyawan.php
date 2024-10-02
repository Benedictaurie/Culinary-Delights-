<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $sql="select * from produk";
        $ukuran=$conn->query($sql);
        $content="views/produk/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['nama_produk'])){
                $err['nama_produk']="Nama Produk Wajib";
            }
            if(!is_numeric($_POST['id_produk'])){
                $err['id_produk']="ID Produk Wajib";
            }
            if(!is_numeric($_POST['ukuran'])){
                $err['ukuran']="Ukuran Produk Wajib";
            }
            if(!isset($err)){
                $id_karyawan=$_SESSION['login']['id'];
                if(!empty($_POST['id_produk'])){
                    //update
                    $sql="update produk set nama_produk='$_POST[nama_produk]',id_produk='$_POST[id_produk]',ukuran='$_POST[ukuran]',stok='$_POST[stok]',id_karyawan=$id_karyawan where md5(id_produk)='$_POST[id_produk]'";
                }else{
                    //save
                    $sql = "INSERT INTO produk (nama_produk, id_produk, ukuran, stok, id_karyawan)
                    VALUES ('$_POST[nama_produk]','$_POST[id_produk]','$_POST[ukuran]','$_POST[stok]',$id_karyawan)";
                }
            if ($conn->query($sql) === TRUE) {
                header('location: '.$con->site_url().'/admin/index.php?mod=karyawan');
            } else {
              $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
        }
            
        }else{
            $err['msg']="Tidak Diizinkan";
        }
        if(isset($err)){
            $sql="select * from produk";
            $ukuran=$conn->query($sql);
            $content="views/produk/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $produk="select * from produk where md5(id_produk)='$_GET[id]'";
        $produk=$conn->query($produk);
        $_POST=$produk->fetch_assoc();
        $_POST['id']=$_POST['id_produk'];
        $_POST['id_produk']=md5($_POST['id_produk']);
        //var_dump($minuman);
        $sql="select * from produk";
        $ukuran=$conn->query($sql);
        $content="views/produk/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $produk="delete from produk where md5(id_produk)='$_GET[id]'";
        $produk=$conn->query($produk);
        header('location: '.$con->site_url().'/admin/index.php?mod=karyawan');
    break;
    default:
        $sql="Select * from produk";
        $produk=$conn->query(query: $sql);
        $conn->close();
        $content="views/produk/tampil.php";
        include_once 'views/template.php';
}
?>