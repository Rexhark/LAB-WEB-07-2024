let harga = Number(prompt ("Masukkan Harga")) 
if (isNaN(harga) || harga<0) {
    console.log("Input Tidak Valid Silahkan Masukkan Angka Yang Benar");
    
}else{
    let inputProduk = prompt ("Masukkan Produk")
    let produk = inputProduk.toLowerCase()
    let discount;
    let discountPrice;
    // if (produk === "elektronik") {
    //     discount = 10
    //     // discountPrice = harga*0.90
    // }else if (produk === "pakaian") {
    //     discount = 20 
    //     // discountPrice = harga*0.80
    // }else if (produk === "makanan") {
    //     discount = 5
    //     // discountPrice = harga*0.95
    // }else {
    //     discount = 0
    // }
    switch (produk) {
        case 'elektronik':
            discount = 10
            break;
        case 'pakaian':
            discount = 20
            break;
        case 'makanan':
            discount = 5
            break;
        default :
            discount = 0
    }
    discountPrice = harga-(harga*discount/100)

    console.log(`Harga Awal: ${harga}`);
    console.log(`Diskon: ${discount}%`);
    console.log(`Harga Setelah Diskon: ${discountPrice}`);
    
}
