let angkaGenap = []
function countEvenNumbers(start,end) {
    for (let i = start ;i <= end ; i++) {
        if(i%2 == 0) {
            angkaGenap.push(i);
        }
    }
} 
countEvenNumbers(3,0);
console.log(`output: ${angkaGenap.length} (${angkaGenap})`);

