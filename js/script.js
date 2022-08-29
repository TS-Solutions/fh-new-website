//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/



// $('.input-number').focusin(function () {
//     $(this).data('oldValue', $(this).val());
// });

// $('.input-number').change(function () {

//     minValue = parseInt($(this).attr('min'));
//     maxValue = parseInt($(this).attr('max'));
//     valueCurrent = parseInt($(this).val());

//     name = $(this).attr('name');
//     if (valueCurrent >= minValue) {
//         $(".btn-check[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
//     } else {
//         alert('Sorry, the minimum value was reached');
//         $(this).val($(this).data('oldValue'));
//     }
//     if (valueCurrent <= maxValue) {
//         $(".btn-check[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
//     } else {
//         alert('Sorry, the maximum value was reached');
//         $(this).val($(this).data('oldValue'));
//     }

// });

// $(".input-number").keydown(function (e) {
//     // Allow: backspace, delete, tab, escape, enter and .
//     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
//         // Allow: Ctrl+A
//         (e.keyCode == 65 && e.ctrlKey === true) ||
//         // Allow: home, end, left, right
//         (e.keyCode >= 35 && e.keyCode <= 39)) {
//         // let it happen, don't do anything
//         return;
//     }
//     // Ensure that it is a number and stop the keypress
//     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//         e.preventDefault();
//     }
// });

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
            document.getElementById('Div3').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div2').style.display = 'none';
            document.getElementById('Div3').style.display = 'block';
            document.getElementById('bottombtn1').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible2() {
    if (document.getElementById('Div3')) {

        if (document.getElementById('Div3').style.display == 'none') {
            document.getElementById('Div3').style.display = 'block';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'block';
            document.getElementById('Div4').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div3').style.display = 'none';
            document.getElementById('bottombtn1').style.display = 'none';
            document.getElementById('Div4').style.display = 'block';
            document.getElementById('bottombtn2').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible3() {
    if (document.getElementById('Div4')) {

        if (document.getElementById('Div4').style.display == 'none') {
            document.getElementById('Div4').style.display = 'block';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('Div5').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div4').style.display = 'none';
            document.getElementById('bottombtn2').style.display = 'none';
            document.getElementById('Div5').style.display = 'block';
            document.getElementById('bottombtn3').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible4() {
    if (document.getElementById('Div5')) {

        if (document.getElementById('Div5').style.display == 'none') {
            document.getElementById('Div5').style.display = 'block';
            document.getElementById('bottombtn3').style.display = 'block';
            document.getElementById('Div6').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div5').style.display = 'none';
            document.getElementById('bottombtn3').style.display = 'none';
            document.getElementById('Div6').style.display = 'block';
            document.getElementById('bottombtn4').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible5() {
    if (document.getElementById('Div6')) {

        if (document.getElementById('Div6').style.display == 'none') {
            document.getElementById('Div6').style.display = 'block';
            document.getElementById('bottombtn4').style.display = 'block';
            document.getElementById('Div7').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'block';
        } else {
            document.getElementById('Div6').style.display = 'none';
            document.getElementById('bottombtn4').style.display = 'none';
            document.getElementById('Div7').style.display = 'block';
            document.getElementById('bottombtn5').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'block';
        }
    }
}

function switchVisible6() {
    if (document.getElementById('Div7')) {

        if (document.getElementById('Div7').style.display == 'none') {
            document.getElementById('Div7').style.display = 'block';
            document.getElementById('bottombtn5').style.display = 'block';
            document.getElementById('Div8').style.display = 'none';
            document.getElementById('bottombtns').style.display = 'none';
        } else {
            document.getElementById('Div7').style.display = 'none';
            document.getElementById('bottombtn5').style.display = 'none';
            document.getElementById('Div8').style.display = 'block';
            document.getElementById('bottombtns').style.display = 'none';
        }
    }
}

function switchVisible7() {
    if (document.getElementById('Div8')) {

        if (document.getElementById('Div8').style.display == 'none') {
            document.getElementById('Div8').style.display = 'block';
            document.getElementById('Div9').style.display = 'none';
        } else {
            document.getElementById('Div8').style.display = 'none';
            document.getElementById('Div9').style.display = 'block';
        }
    }
}

function switchVisible8() {
    if (document.getElementById('Div9')) {

        if (document.getElementById('Div9').style.display == 'none') {
            document.getElementById('Div9').style.display = 'block';
            document.getElementById('Div10').style.display = 'none';
        } else {
            document.getElementById('Div9').style.display = 'none';
            document.getElementById('Div10').style.display = 'block';
        }
    }
}

function switchVisible9() {
    if (document.getElementById('Div10')) {

        if (document.getElementById('Div10').style.display == 'none') {
            document.getElementById('Div10').style.display = 'block';
            document.getElementById('Div11').style.display = 'none';
        } else {
            document.getElementById('Div10').style.display = 'none';
            document.getElementById('Div11').style.display = 'block';
        }
    }
}



$(document).ready(function () {

    $("#datepicker1").datepicker({
      autoclose: true,
      dateFormat: 'dd/mm/yy',
      todayHighlight: true,

        onSelect: function () {
            $('label[for="startradio4"]').text($(this).val());
            console.log("It's not working");
        }
    });

    $("#startradio4").click(function () {
        console.log("It's working");
        $("#datepicker1").datepicker("show");
    });

});

// $(document).scroll(function () {
//     var cutoff = $(window).scrollTop();

//     $('section').each(function () {
//         if ($(this).offset().top + $(this).height() > cutoff) {
//             $('section').removeClass('active-function');
//             $(this).addClass('active-function');
//             console.log('chalgaya');
//             return false;
//         }
//     });
// });

// $("document").ready(function () {
//     $('#Buttonpwr').click(function () {
//         var files = new Array();

//         //xzyId is table id.
//         $('section').each(function () {
//             if ($(this).is('active-function')) {
//                 alert(this.value);
//                 console.log('chalgaya');
//                 window.open(this.value);
//             }
//         });
//     });

// });


const step1 = document.querySelector("#Div7")  
if (step1.style.display === "block") {

console.log("True");
var div1 = document.getElementById('colswitch');
var content = document.createElement("div");
div1.appendChild(content);
content.setAttribute("id", "switch2")
content.classList.add("col-3")
var Ptag = document.createElement('p');
content.appendChild(Ptag);


const body = document.body
const div = document.querySelector("div")
const swicth1 = document.querySelector("#switch1")
swicth1.classList.replace("col-4", "col-3")
const swicth3 = document.querySelector("#switch3")
swicth3.classList.replace("col-4", "col-3")
const swicth4 = document.querySelector("#switch4")
swicth4.classList.replace("col-4", "col-3")

}
else {
    console.log('false')
}