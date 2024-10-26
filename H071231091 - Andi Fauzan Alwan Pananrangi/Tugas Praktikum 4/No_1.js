function countEvenNumbers(angkaAwal, angkaAkhir) {
    if (angkaAwal > angkaAkhir) {
        console.log("EROR");
        return 0;
    }
    
    let angkaGenap = [];
    
    for (let i = angkaAwal; i <= angkaAkhir; i++) {
        if (i % 2 === 0) {
            angkaGenap.push(i);
        }
    }

    let output = `(${angkaGenap.join(", ")})`;
  
    console.log(angkaGenap.length, output);
   
}
  
countEvenNumbers(0, 3);
