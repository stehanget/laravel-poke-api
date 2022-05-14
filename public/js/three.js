const setOutputPattern = n => {
    let html = ''
    let y = 2 * n - 1

    for (let i = 1; i <= n; i++) {
        for (let j = 1; j <= y; j++) {
            html += formula(i, j, y)
        }

        html += '\n'
    }

    for (let i = n - 1; i >= 1; i--) {
        for (let j = 1; j <= y; j++) {
            html += formula(i, j, y)
        }

        html += '\n'
    }

    $('#output-pattern').val(html)
}

const formula = (i, j, y) => {
    let a = 2 * i - 1
    let b = (y - a) / 2

    return (j < b + 1 || j > a + b) ? '+' : '-'
}

$(document).on('click', '#btn-submit-pattern', function () {
    let n = Number($('#input-pattern').val())
    setOutputPattern(n)
})

$(document).ready(function () {
    setOutputPattern(3)
})