const namaHari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];

let inputHari = prompt("Masukkan Hari").toLowerCase();

if (namaHari.includes(inputHari)) {
    let jumlahHari = prompt("Masukkan Jumlah Hari Yang Ingin di Tambahkan:");
    jumlahHari = Number(jumlahHari); 
    
    if (isNaN(jumlahHari) || jumlahHari < 0) {
        console.log("Input tidak valid");
    } else {
        let indexHariBerikutNya = (namaHari.indexOf(inputHari) + jumlahHari) % 7;
        let hariBerikutNya = namaHari[indexHariBerikutNya];
        console.log(`${jumlahHari} hari setelah ${inputHari} adalah hari ${hariBerikutNya}`);
    }
} else {
    console.log("Input tidak valid. Masukkan hari yang benar.");
}
