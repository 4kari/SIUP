function hitung(time) {
    var barang1 = document.getElementById('barang1').value;
    var barang2 = document.getElementById('barang2').value;
    var barang3 = document.getElementById('barang3').value;
    var barang4 = document.getElementById('barang4').value;

    var ftagihan = document.getElementById('tagihanfield');
    var harga = document.getElementById('harga');
    var ket = document.getElementById('keterangan');
    var ket1 = document.getElementById('keterangan1');
    var ket2 = document.getElementById('keterangan2');
    var ket3 = document.getElementById('keterangan3');
    var ket4 = document.getElementById('keterangan4');
    var hasil = (Number(barang1) * 235) + (Number(barang2) * 400) + (Number(barang3) * 600) + (Number(barang4) * 1000);

    ftagihan.innerHTML = "Total : Rp. " + hasil.toString();
    ket1.innerHTML = "Total : Rp. " + hasil.toString();

    harga.value = hasil.toString();
    ket.value = "Hitam Putih ; " + barang1.toString() +
        "hlm 1/4 Warna : " + barang2.toString() +
        "hlm 1/2 Warna : " + barang3.toString() +
        "hlm Full Warna : " + barang4.toString();

}