var messagesRu = {
    alpha_dash: function (field) { return ("Поле " + field + " может содержать только буквы, цифры и дефис."); },
    alpha_num: function (field) { return ("Поле " + field + " может содержать только буквы и цифры."); },
    alpha_spaces: function (field) { return ("Поле " + field + " может содержать только буквы и пробелы."); },
    alpha: function (field) { return ("Поле " + field + " может содержать только буквенные знаки."); },
    between: function (field, ref) {
        var min = ref[0];
        var max = ref[1];

        return ("Значение поля " + field + " должно быть между " + min + " и " + max + ".");
    },
    confirmed: function (field) { return ("Поле " + field + " не совпадает."); },
    credit_card: function (field) { return ("Поле " + field + " не валидно."); },
    decimal: function (field, ref) {
        if ( ref === void 0 ) ref = ['*'];
        var decimals = ref[0];

        return ("Поле " + field + " должно быть числовым и может содержать " + (decimals === '*' ? '' : decimals) + " десятичных числа.");
    },
    digits: function (field, ref) {
        var length = ref[0];

        return ("Поле " + field + " должно быть числовым и точно содержать " + length + " цифры.");
    },
    dimensions: function (field, ref) {
        var width = ref[0];
        var height = ref[1];

        return ("Поле " + field + " должно быть " + width + " пикселей на " + height + " пикселей.");
    },
    email: function (field) { return ("Поле " + field + " должно быть действительным электронным адресом."); },
    ext: function (field) { return ("Поле " + field + " должно быть действительным файлом."); },
    image: function (field) { return ("Поле " + field + " должно быть изображением."); },
    in: function (field) { return ("Поле " + field + " должно быть допустимым значением."); },
    ip: function (field) { return ("Поле " + field + " должно быть действительным IP-адресом."); },
    max: function (field, ref) {
        var length = ref[0];

        return ("Поле " + field + " не может быть более " + length + " символов.");
    },
    max_value: function (field, ref) {
        var max = ref[0];

        return ("Поле " + field + " должно быть " + max + " или меньше.");
    },
    mimes: function (field) { return ("Поле " + field + " должно иметь действительный тип файла."); },
    min: function (field, ref) {
        var length = ref[0];

        return ("Поле " + field + " должно быть не менее " + length + " символов.");
    },
    min_value: function (field, ref) {
        var min = ref[0];

        return ("Поле " + field + " должно быть " + min + " или больше.");
    },
    not_in: function (field) { return ("Поле " + field + " должно быть допустимым значением."); },
    numeric: function (field) { return ("Поле " + field + " должно быть числом."); },
    regex: function (field) { return ("Формат поля " + field + " неверный."); },
    required: function (field) { return ("Поле " + field + " должно быть заполнено."); },
    size: function (field, ref) {
        var size = ref[0];

        return ("Поле " + field + " должно быть меньше, чем " + size + " KB.");
    },
    url: function (field) { return ("Поле " + field + " не является валидным URL."); }
};