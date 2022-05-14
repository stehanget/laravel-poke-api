var url = 'pokemon'
var param = ''

var checkedPage = false
var checkedLimit = false
var checkedSorting = false
var checkedSearch = false

var inputPage = 1
var inputLimit = 20
var inputSorting = 'asc'
var inputSearch = 'pikachu'

const setParam = () => {
    if (checkedPage || checkedLimit || checkedSorting || checkedSearch) {
        let arrParam = []

        if (checkedPage) {
            arrParam.push(`page=${inputPage}`)
        }

        if (checkedLimit) {
            arrParam.push(`limit=${inputLimit}`)
        }

        if (checkedSorting) {
            arrParam.push(`sort=${inputSorting}`)
        }

        if (checkedSearch) {
            arrParam.push(`search=${inputSearch}`)
        }

        param = `?${arrParam.join('&')}`
    } else {
        param = ''
    }

    $('#input-url').val(`${url}${param}`)

    getPokemonData()
}

const getPokemonData = () => {
    $.ajax({
        async: true,
        crossDomain: true,
        url: `http://127.0.0.1:8000/api/${url}${param}`,
        method: 'GET',
        headers: {
            "x-api-key": "KuKMQbgZPv0PRC6GqCMlDQ7fgdamsVY75FrQvHfoIbw4gBaG5UX0wfk6dugKxrtW"
        }
    }).done(function (res) {
        $('#output-json').val(JSON.stringify(res))
        setOptionPage(res.data.total_page)
    });
}

const setOptionPage = val => {
    let html = ``

    for (let i = 1; i <= val; i++) {
        html += `<option value="${i}">${i}</option>`
    }

    $('#select-page').html(html)
    $(`#select-page option[value=${inputPage}]`).attr('selected', 'selected')
}

$(document).on('change', '#checkbox-page', function () {
    checkedPage = this.checked

    if (this.checked) {
        $('#select-page').removeAttr('disabled')
    } else {
        $('#select-page').attr('disabled', true)
    }

    setParam()
})

$(document).on('change', '#checkbox-limit', function () {
    checkedLimit = this.checked

    if (this.checked) {
        $('#input-limit').removeAttr('disabled')
    } else {
        $('#input-limit').attr('disabled', true)
    }

    setParam()
})

$(document).on('change', '#checkbox-sorting', function () {
    checkedSorting = this.checked

    if (this.checked) {
        $('#select-sorting').removeAttr('disabled')
    } else {
        $('#select-sorting').attr('disabled', true)
    }

    setParam()
})

$(document).on('change', '#checkbox-search', function () {
    checkedSearch = this.checked

    if (this.checked) {
        $('#input-search').removeAttr('disabled')
    } else {
        $('#input-search').attr('disabled', true)
    }

    setParam()
})

$(document).on('change', '#select-page', function () {
    inputPage = Number(this.value)

    setParam()
})

$(document).on('keyup mouseup', '#input-limit', function () {
    inputLimit = Number(this.value)

    setParam()
})

$(document).on('change', '#select-sorting', function () {
    inputSorting = this.value

    setParam()
})

$(document).on('keyup mouseup', '#input-search', function () {
    inputSearch = this.value

    setParam()
})

$(document).ready(function () {
    getPokemonData()
})