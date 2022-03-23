 <?php
                            //jika tanggal dari dan tanggal ke ada maka
                            if(isset($_GET['dari']) && isset($_GET['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari
                                $data = mysqli_query($conn, "SELECT * FROM catatanperjalanan WHERE tanggal BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
                            }else{
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                                $data = mysqli_query($conn, "select * from catatanperjalanans");
                            }
                            // $no digunakan sebagai penomoran
                            $no = 1;
                            // while digunakan sebagai perulangan data
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['tgl_transaksi']; ?></td>
                            <td><?php echo $d['keterangan_transaksi']; ?></td>
                            <td><?php echo $d['total_transaksi']; ?></td>
                        </tr>
                        <?php } ?>
