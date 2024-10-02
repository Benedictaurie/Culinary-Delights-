<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=karyawan&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" name="nama_produk" required value="<?=(isset($_POST['nama_produk']))?$_POST['nama_produk']:'';?>" class="form-control">
            <input type="hidden" name="id_produk"  value="<?=(isset($_POST['id_produk']))?$_POST['id_produk']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama_produk']))?$err['nama_produk']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">ID Produk</label>
            <input type="number" name="no_id" value="<?=(isset($_POST['no_id']))?$_POST['no_id']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['no_id']))?$err['no_id']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="">Produk</label>
        <input type="text" name="produk" required value="<?=(isset($_POST['produk']))?$_POST['produk']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['produk']))?$err['produk']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Ukuran</label>
        <select name="ukuran" class="form-control"required id="">
            <option value="">Pilih Ukuran</option>
            <?php if($ukuran != null){
                foreach($ukuran as $row){?>
                    <option <?=(isset($_POST['id_produk']) && $_POST['id_produk']==$row['id_produk'] )?"selected":'';?> value="<?=$row['id_produk'];?>"> <?=$row['produk'];?></option>
                <?php }
            }?>
        </select>
        <span class="text-danger"><?=(isset($err['produk']))?$err['produk']:'';?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>