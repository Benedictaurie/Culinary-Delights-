<div class="row">
    <div class="pull-left">
        <h4>Daftar Produk</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=karyawan&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>Nama Produk</td><td>ID Produk</td>Ukuran<th><td>Stok</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($produk != NULL){ 
                $no=1;
                foreach($produk as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['nama_produk']?></td><td><?=$row['id_produk'];?></td><td><?=$row['ukuran']?></td>
                        <td><?=$row['stok']?></td>                        
                        <td>
                            <a href="index.php?mod=karyawan&page=edit&id=<?=md5($row['id_produk'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=karyawan&page=delete&id=<?=md5($row['id_produk'])?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>