<?php
$m1 = ['nim' => '1200367', 'nama' => 'anggi', 'nilai' => 45];
$m2 = ['nim' => '1390785', 'nama' => 'aisyah', 'nilai' => 75];
$m3 = ['nim' => '1520076', 'nama' => 'bambang', 'nilai' => 50];
$m4 = ['nim' => '3410085', 'nama' => 'raihan', 'nilai' => 94];
$m5 = ['nim' => '7258609', 'nama' => 'andika', 'nilai' => 94];
$m6 = ['nim' => '4240701', 'nama' => 'nasywa', 'nilai' => 78];
$m7 = ['nim' => '3310021', 'nama' => 'saniah', 'nilai' => 50];
$m8 = ['nim' => '7701423', 'nama' => 'akbar', 'nilai' => 61];
$m9 = ['nim' => '5621098', 'nama' => 'methuona', 'nilai' => 57];
$m10 = ['nim' => '6615240', 'nama' => 'madzhar', 'nilai' => 61];

$foot = [
    'No', 'nim', 'nama', 'nilai', 'keterangan',
    'grade', 'predikat'
];

$mhs = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

$nim = ['nim'];
$nama = ['nama'];
$mahasiswa = count($mhs);
$data_nilai = array_column($mhs, 'nilai');
$nilai_tertinggi = max($data_nilai);
$nilai_terendah = min($data_nilai);
$total = array_sum($data_nilai);
$rata2 = $total / $mahasiswa ;




$keterangan = [
    'mahasiswa' => $mahasiswa,
    'nilai tertinggi' => $nilai_tertinggi,
    'nilai terendah' => $nilai_terendah,
    'rata rata' => $rata2,
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Daftar Mahasiswa</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                foreach ($foot as $ft) {
                ?>
                    <th><?= $ft ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($mhs as $mahasiswa) {
                $nilai = $mahasiswa['nilai'];

                $ket = ($nilai >= 60) ? "Lulus" : "Gagal";

                if ($nilai >= 85 && $nilai <= 100) $grade = 'A';
                else if ($nilai >= 75 && $nilai < 85) $grade = 'B';
                else if ($nilai >= 60 && $nilai < 75) $grade = 'C';
                else if ($nilai >= 30 && $nilai < 60) $grade = 'D';
                else if ($nilai >= 0 && $nilai < 30) $grade = 'E';
                else $grade = '';

                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                        break;
                    case 'B':
                        $predikat = 'Bagus';
                        break;
                    case 'C':
                        $predikat = 'Cukup';
                        break;
                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Buruk';
                        break;
                    default:
                        $predikat = '';
                        break;
                }
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mahasiswa['nim'] ?></td>
                    <td><?= $mahasiswa['nama'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $nilai ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
        <tfoot>
            <?php
            foreach ($keterangan as $ket => $hasil) {
            ?>
                <tr>
                    <th colspan="7"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
            <?php } ?>
        </tfoot>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>