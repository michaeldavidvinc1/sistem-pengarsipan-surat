<!DOCTYPE html>
<html>

<head>
    <title>Laporan Surat Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .header-img {
            position: absolute;
            top: 15;
            left: 130;
        }

        .header h1,
        .header h2,
        .header h3,
        .header p {
            margin: 0;
            font-size: 12px;
        }

        .header h1 {
            font-size: 16px;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
        }

        .form-group label {
            flex: 0 0 150px;
            font-weight: bold;
        }

        .form-group .colon {
            flex: 0 0 10px;
        }

        .form-group p {
            flex: 1;
            padding: 5px;
            border: 1px solid black;
            box-sizing: border-box;
        }

        .footer {
            margin-top: 50px;
            float: right;
        }

        .footer .signature {
            text-align: center;
        }

        .footer .signature p {
            margin: 50px 0 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="header-img" src="assets/logo.png" width="50" height="50" alt="Logo">
            <h1>SYEKH ABDUL WAHAB ROKAN FOUNDATION</h1>
            <h2>Babussalam Islamic Boarding School – Muslim Orphanage – Darussalam Mosque</h2>
            <h3>YAYASAN SYEKH ABDUL WAHAB ROKAN</h3>
            <h3>PONDOK PESANTREN BABUSSALAM – PANTI ASUHAN MUSLIMIN – MASJID DARUSSALAM</h3>
            <h3>PEKANBARU – RIAU – INDONESIA</h3>
            <p>JL. H.R. Soebrantas No. 62 Telp. (0761)6700-642, Pekanbaru 28294 Email : pesantrenbabussalampku@gmail.com
                Website : http://www.pesantrenbabussalam.com</p>
        </div>
        <hr />
        <div class="form-title">
            Rekapan Laporan Surat Masuk (Penerima dan Periode)
        </div>
        <table>
            <thead>
                <tr>
                    <th>No Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>Jenis Surat</th>
                    <th>Asal Surat</th>
                    <th>Keterangan</th>
                    <th>Status Disposisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->no_sm }}</td>
                        <td>{{ $item->tgl_surat }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>{{ $item->jenis_surat }}</td>
                        <td>{{ $item->asal_surat }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->status_disposisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <div class="signature">
                <p>Pekanbaru, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                <p style="margin-top: -4px">Mengetahui</p>
                <p>Pimpinan</p>
            </div>
        </div>
    </div>

</body>

</html>
