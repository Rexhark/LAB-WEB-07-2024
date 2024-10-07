
const jawaban = Math.floor(Math.random()*100)+1

let attempts = 0
let tebakan;
let jalankan = true 

while (jalankan) {
   tebakan = prompt ("Masukkan salah satu dari angka 1 sampai 100:")
   tebakan = Number(tebakan)
   if (isNaN(tebakan)){
    alert("Masukkan inputan yang valid berupa angka")
   }else if (tebakan<1 || tebakan>100){
    alert("pilih angka 1-100")
   }else {
    attempts++
    if (tebakan>jawaban){
        alert ("Terlalu tinggi! coba lagi")
    }else if (tebakan<jawaban){
        alert ("Terlalu rendah! coba lagi")
    }else {
        alert (`Selamat! kamu berhasil menebak angka ${jawaban} dengan benar sebanyak ${attempts}x percobaan`)
        jalankan = false
    }
   }
}
