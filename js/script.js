$('.btn-working').click(function (e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if (type == 'minus') {

            if (currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if (type == 'plus') {

            if (currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

$('.btn-working').click(function (e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='quant[1]']");
    var currentVal = parseInt(input.val());
    if (currentVal == 0) {
        $('.single-box1').addClass('img-opacity');
        $('.single-box1').removeClass('img-opacityfull');
        $('.single-box1').addClass('pad5');
    }
    if (currentVal == 1) {
        $('.double-box1').hide();
        $('.single-box1').removeClass('img-opacity');
        $('.single-box1').addClass('img-opacityfull');
        $('.single-box1').addClass('pad5');
    }
    if (currentVal == 2) {
        $('.double-box1').show();
        $('.single-box1').removeClass('pad5');
    }
});

$('.btn-working').click(function (e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='quant[2]']");
    var currentVal = parseInt(input.val());
    if (currentVal == 0) {
        $('.single-box2').addClass('img-opacity');
        $('.single-box2').removeClass('img-opacityfull');
        $('.single-box2').addClass('pad5');
    }
    if (currentVal == 1) {
        $('.double-box2').hide();
        $('.single-box2').removeClass('img-opacity');
        $('.single-box2').addClass('img-opacityfull');
        $('.single-box2').addClass('pad5');
    }
    if (currentVal == 2) {
        $('.double-box2').show();
        $('.single-box2').removeClass('pad5');
    }
});
$(document).ready(function () {

    $('.btn-working').click(function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='quant[3]']");
        var currentVal = parseInt(input.val());
        if (currentVal == 0) {
            $('.single-box3').addClass('img-opacity');
            $('.single-box3').removeClass('img-opacityfull');
            $('.single-box3').addClass('pad5');
        }
        if (currentVal == 1) {
            $('.double-box3').hide();
            $('.single-box3').removeClass('img-opacity');
            $('.single-box3').addClass('img-opacityfull');
            $('.single-box3').addClass('pad5');
        }
        if (currentVal == 2) {
            $('.double-box3').show();
            $('.single-box3').removeClass('pad5');
        }
    })

});

$('.input-number').focusin(function () {
    $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function () {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
        $(".btn-working[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {

        $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-working[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {

        $(this).val($(this).data('oldValue'));
    }
});


function greenegg() {
    var div1 = document.getElementById('green-egg');
    var div2 = document.getElementById('hover-egg');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}

function greenfish() {
    var div1 = document.getElementById('green-fish');
    var div2 = document.getElementById('hover-fish');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}

function greenshrimp() {
    var div1 = document.getElementById('green-shrimp');
    var div2 = document.getElementById('hover-shrimp');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}

function greenmeat() {
    var div1 = document.getElementById('green-meat');
    var div2 = document.getElementById('hover-meat');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}

function greenchicken() {
    var div1 = document.getElementById('green-chicken');
    var div2 = document.getElementById('hover-chicken');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}

function greennut() {
    var div1 = document.getElementById('green-nut');
    var div2 = document.getElementById('hover-nut');

    if (div1 !== undefined && div2 !== undefined) {
        div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
        div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
    }
}



function show(str) {
    document.getElementById('deliverytab3').style.display = 'none';
    document.getElementById('deliverytab2').style.display = 'block';
}

function show2(sign) {
    document.getElementById('deliverytab3').style.display = 'block';
    document.getElementById('deliverytab2').style.display = 'none';
}



function switchVisible() {
    if (document.getElementById('Div1')) {

        if (document.getElementById('Div1').style.display == 'none') {
            document.getElementById('Div1').style.display = 'block';
            document.getElementById('Div2').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'none';
        } else {
            document.getElementById('Div1').style.display = 'none';
            document.getElementById('Div2').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'none';
        }
    }
}

function switchVisible1() {
    if (document.getElementById('Div2')) {

        if (document.getElementById('Div2').style.display == 'none') {
            document.getElementById('Div2').style.display = 'block';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div2').style.display = 'none';
            document.getElementById('mealtype').style.display = 'block';
            document.getElementById('bottombtn1').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible2() {
    if (document.getElementById('mealtype')) {

        if (document.getElementById('mealtype').style.display == 'none') {
            document.getElementById('mealtype').style.display = 'block';
            document.getElementById('bottombtn1').style.display = 'block';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'block';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible3() {
    if (document.getElementById('selectmeal1')) {

        if (document.getElementById('selectmeal1').style.display == 'none') {
            document.getElementById('selectmeal1').style.display = 'block';
            document.getElementById('bottombtn2').style.display = 'block';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('payment').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'block';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible4() {
    if (document.getElementById('selectmeal2')) {

        if (document.getElementById('selectmeal2').style.display == 'none') {
            document.getElementById('selectmeal2').style.display = 'block';
            document.getElementById('bottombtn3').style.display = 'block';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('payment').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('startdate').style.display = 'block';
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible5() {
    if (document.getElementById('startdate')) {

        if (document.getElementById('startdate').style.display == 'none') {
            document.getElementById('startdate').style.display = 'block';
            document.getElementById('bottombtn4').style.display = 'block';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('payment').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('deliveryopt').style.display = 'block';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('payment').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible6() {
    if (document.getElementById('deliveryopt')) {

        if (document.getElementById('deliveryopt').style.display == 'none') {
            document.getElementById('deliveryopt').style.display = 'block';
            document.getElementById('bottombtn5').style.display = 'block';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('payment').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('deliveryopt').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('payment').style.display = 'block';
            document.getElementById('mealtype').style.display = 'none';
            document.getElementById('selectmeal1').style.display = 'none';
            document.getElementById('selectmeal2').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'none';
        }
    }
}

function switchVisible7() {
    if (document.getElementById('payment')) {

        if (document.getElementById('payment').style.display == 'none') {
            document.getElementById('payment').style.display = 'block';
            document.getElementById('Div9').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
        } else {
            document.getElementById('payment').style.display = 'none';
            document.getElementById('startdate').style.display = 'none';
            document.getElementById('Div9').style.display = 'block';
        }
    }
}


(function ($) {
    $(document).ready(function () {
        $(document).on("change", ".days-buttons input", function () {
            var numberOfChecked = $(".days-buttons input:checkbox:checked").length;
            if (numberOfChecked >= 5) {
                $(".days-buttons input:not(:checked)").prop("disabled", true);
            } else {
                $(".days-buttons input:not(:checked)").removeAttr("disabled", true);
            }
        });
    });
})(jQuery);




$(document).ready(function () {

    $("#datepicker1").datepicker({
        autoclose: true,
        dateFormat: 'dd/mm/yy',
        todayHighlight: true,

        onSelect: function () {
            $('label[for="startradio4"]').text($(this).val());
        }
    });

    $("#startradio4").click(function () {
        $("#datepicker1").datepicker("show");
    });

});

$('.eggs').click(function () {
    const new_src = $(this).attr('data-img');
    const curr_src = $(this).find('.green-egg').attr('src');
    $(this).attr('data-img', curr_src);

    $(this).toggleClass("active");
    $(this).find('.green-egg').attr("src", new_src);
});


// const step1 = document.querySelector("#deliveryopt")
// if (step1.style.display === "block") {

//     console.log("True");
//     var div1 = document.getElementById('colswitch');
//     var content = document.createElement("div");
//     div1.appendChild(content);
//     content.setAttribute("id", "switch2")
//     content.classList.add("col-3")
//     var Ptag = document.createElement('p');
//     content.appendChild(Ptag);


//     const body = document.body
//     const div = document.querySelector("div")
//     const swicth1 = document.querySelector("#switch1")
//     swicth1.classList.replace("col-4", "col-3")
//     const swicth3 = document.querySelector("#switch3")
//     swicth3.classList.replace("col-4", "col-3")
//     const swicth4 = document.querySelector("#switch4")
//     swicth4.classList.replace("col-4", "col-3")

// } else {
//     console.log('false')
// }