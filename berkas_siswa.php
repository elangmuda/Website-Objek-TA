<?php
// Mulai sesi
session_start();

// Cek jika pengguna tidak memiliki level "admin", arahkan ke halaman login
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Berkas Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .table-container .btn-primary {
            align-self: flex-end;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a class="navbar-brand" href="Dashboard.php">SMAN 1 Parongpong</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Prakp3l/kelola_peserta.php">Kelola Data Peserta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Prakp3l/berkas_siswa.php">Berkas Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Prakp3l/jadwal.php">Jadwal Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Prakp3l/hasil_test.php">Hasil Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="periode.php">Periode</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_admin.php">Tambah Admin</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
        <!-- Isi halaman lainnya -->
    
    <div class="container">
        <div class="table-container">
            <h2 class="display-6">Data Berkas Siswa</h2>
            <table class="table table-bordered table-striped" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Berkas</th>
                        <th>Nama</th>
                        <th>Kartu Keluarga</th>
                        <th>Ijazah</th>
                        <th>SHUN</th>
                        <th>KIP</th>
                        <th>Sertifikat Prestasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                    
                        $berkas = mysqli_query($koneksi,"select * from berkas");
                        $counter = 1;
                        ?>
                        <?php while($v=mysqli_fetch_array($berkas)):;?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $v["id_berkas"];?></td>
                                <td><?php echo $v["nama_lengkap"];?></td>
                                <td><iframe src="<?php echo $v["file_kartu_keluarga"]; ?>" width="200" height="100"></iframe></td>
                                <td><iframe src="<?php echo $v["file_ijazah"]; ?>" width="200" height="100"></iframe></td>
                                <td><iframe src="<?php echo $v["file_shun"]; ?>" width="200" height="100"></iframe></td>
                                <td><iframe src="<?php echo $v["file_kip"]; ?>" width="200" height="100"></iframe></td>
                                <td><iframe src="<?php echo $v["file_serti_prestasi"]; ?>" width="200" height="100"></iframe></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="hapus_berkas.php?id_berkas=<?php echo $v["id_berkas"];?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile;?>
                        <!-- Tambahkan baris sesuai dengan data peserta -->
                </tbody>
            </table>
            
        </div>
    </div>
    </div>
     <!-- Footer -->
     <div class="footer">
        <p>&copy; 2023 Kelompok 3. All rights reserved.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
