const setOutputAnagram = () => {
    let html = ''
    let anagrams = {}
    let inputAnagram = $('#input-anagram').val().split(',').map(v => v.trim())


    for (let i in inputAnagram) {
        let word = inputAnagram[i];
        let sorted = word.split('').sort().join('');
    
        if (anagrams[sorted] != null) {
            anagrams[sorted].push(word);
        } else {
            anagrams[sorted] = [ word ];
        }
    }
    
    for (let sorted in anagrams) {
        let inputAnagram = anagrams[sorted];
        html += `${inputAnagram.join(', ')}\n`
    }

    $('#output-anagram').val(html)
}

$(document).on('click', '#btn-submit-anagram', function () {
    setOutputAnagram()
})

$(document).ready(function () {
    setOutputAnagram()
})