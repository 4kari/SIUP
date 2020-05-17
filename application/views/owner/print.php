<html>

<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: auto;
            width: 680px;
            padding: 5px;
        }

        table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <h1 align="center"><?php echo $ket; ?></h1><br /><br />

    <table border="1" cellpadding="8" align="center">
        <tr>
            <th align=" center">Tanggal</th>
            <th align="center">Harga</th>
            <th align="center">Keterangan</th>
        </tr>

        <?php
        if (!empty($transaksi)) {
            $no = 1;
            foreach ($transaksi as $data) {
                $tgl = date('d-m-Y', strtotime($data->tanggal));

                echo "<tr>";
                echo "<td align='center'>" . $tgl . "</td>";
                echo "<td align='center'>" . $data->harga . "</td>";
                echo "<td>" . $data->keterangan . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>


</body>

</html>