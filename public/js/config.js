

export function validRegex(input , pattern) {
    return input.value.match(pattern);

}
export function inputEmpty(...inputs) {
    inputs.forEach(input => {
        input.value = '';
    });
}

