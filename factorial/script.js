function factorial(n) {
    if (n == 0) {
        return 1;
    }
       else {
        return n * factorial(n - 1);
    }
}

const number = prompt('Enter a positive number: ');

if (number >= 0) {
    const result = factorial(number);
    alert(result);
}
else {
    alert('Enter a positive number.');
}