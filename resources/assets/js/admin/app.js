if (document.forms.length) {
    var dateTimeFields = document.forms[0].querySelectorAll("input[type=datetime]");

    if (dateTimeFields.length) {
        assignPikadayTo(dateTimeFields);
    }
}

function assignPikadayTo(dateTimeFields) {
    Array.from(dateTimeFields).forEach(function(dateTimeField) {
        new Pikaday({
            showTime: true,
            showSeconds: true,
            field: dateTimeField,
            format: 'Y-m-d H:i:s',
            toString: function toString(date, format) {
                var day = numberPadding(date.getDate());
                var month = numberPadding(date.getMonth() + 1);
                var year = date.getFullYear();

                var hours = numberPadding(date.getHours());
                var minutes = numberPadding(date.getMinutes());
                var seconds = numberPadding(date.getSeconds());

                return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
            }
        });
    });
}

function numberPadding(number) {
    if (number < 10) {
        number = '0' + number;
    }

    return number;
}

function showNotice(type, message) {
    var notice = new PNotify({
        title: false,
        text: message,
        type: type,
        styling: 'fontawesome',
        buttons: {
            closer: false,
            sticker: false
        }
    });

    notice.get().click(function () {
        notice.remove();
    });
}