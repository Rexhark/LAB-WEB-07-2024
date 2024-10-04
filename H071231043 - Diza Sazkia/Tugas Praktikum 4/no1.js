function countEvenNumbers(start, end) {
    let jumlah = 0;
    let genap = [];
    
    if (!Number.isInteger(start) || !Number.isInteger(end)) {
        return {jumlah: 0, genap: ["input harus angka"]}
    }
    if (start > end) {
        return {jumlah: 0, genap: ["Angka start lebih besar dari angka end"]}
    } else {
        for (let i = start; i <= end; i++) {
            if(i % 2 === 0){
                jumlah += 1;
                genap.push(i)
            }
        }
    }
    return {jumlah, genap};
} 

let hasil = countEvenNumbers("s",26);
console.log(`Output: ${hasil.jumlah} (${hasil.genap.join(", ")})`);