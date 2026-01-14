<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk</title>
    <style type="text/css">
      * { font-family: "Trebuchet MS"; }
      h1 { text-transform: uppercase; color: salmon; }
      table { border: solid 1px #DDEEEE; border-collapse: collapse; border-spacing: 0; width: 70%; margin: 10px auto; }
      table thead th { background-color: #DDEFEF; border: solid 1px #DDEEEE; color: #336B6B; padding: 10px; text-align: left; }
      table tbody td { border: solid 1px #DDEEEE; color: #333; padding: 10px; }
      a { background-color: salmon; color: #fff; padding: 10px; text-decoration: none; font-size: 12px; }
      .btn-edit { background-color: #336B6B; }
    </style>
  </head>
  <body>
    <center><h1>Data Produk</h1></center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Deskripsi</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        // Sesuaikan 'id_produk' jika kamu mengubah nama kolomnya di database
        $query = "SELECT * FROM produk ORDER BY id_produk ASC";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
          die ("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
        }

        $no = 1; 
        while($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
          <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
          <td style="text-align: center;">
            <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;">
          </td>
          <td>
            <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>" class="btn-edit">Edit</a> |
            <a href="proses_hapus.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php
          $no++; 
        }
      ?>
      </tbody>
    </table>
  </body>
</html>