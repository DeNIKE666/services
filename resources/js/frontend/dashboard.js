var maxLength = 1000;

let inputText = $('#text').val().length;

let input = $('#text');

var textLenCount = $('#char').text('Введено ' + inputText + ' символов / из ' + maxLength);

    updateInput(inputText);

    input.keyup(function () {

        var textlen = input.val().length;

        updateInput(textlen);

        $('#char').text('Введено ' + textlen + ' символов / из ' + maxLength);
    });

    function updateInput(count) {
        return count == 1000 ? input.css('background', '#26284212') : input.css('background', 'none');
    }
